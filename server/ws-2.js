// Importing the required modules
const PORT =  process.env.PORT || 8080;
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const io = require("socket.io")(server, {
    cors: {
      origin: "*",
      methods: ["GET", "POST"],
      credentials: true
    }
});

const fetch = require('node-fetch');
const axios = require('axios').default
const mysql = require('mysql')

const mysql_conn = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "zapwire"
})

mysql_conn.connect()


const authKey = 'e5g7E7Y8w5'

app.get('/', (req, res) => {
    res.send('Hello wrld')
})
  
io.on("connection", ws => {
    console.log("the client has connected")
    let current_session_token = null
    let zapwire_config = {
        refreshRate : 1000
    }

    ws.on('set_config', (data) => {
        let temp_config = JSON.parse(data)

        if (temp_config.refreshRate) zapwire_config.refreshRate = temp_config.refreshRate
    })

    ws.on('create_session', async (channel_key) => {
        
        mysql_conn.query(`SELECT * FROM zw_channels WHERE ch_key = '${channel_key}'`, (err, channel_validate) => {
            if(err) throw err
            
            let token = generate_token()
            let channel_id = channel_validate[0]?.id
            
            mysql_conn.query(`INSERT INTO zw_sessions (id, token, channel_id, date_created) VALUES ('${null}', '${token}', '${channel_id}', 'current_timestamp()')`, (err, session_creation) => {
                if(err) throw err

                let session_token = token

                if(!channel_validate[0]?.id){
                    ws.emit('error', `Channel with the key ${channel_key} does not exist`)
                    ws.disconnect()
                } else {
                    ws.emit('session_created', session_token)
                }
            })
        })
    })

    
    ws.on("wire", async (session_token) => {
        mysql_conn.query(`SELECT * FROM zw_sessions WHERE token = ${mysql_conn.escape(session_token)}`, (err, session_check) => {
            if (err) throw err
            
            current_session_token = session_check[0].token

            mysql_conn.query(`SELECT * FROM zw_channels WHERE id = ${session_check[0].channel_id}`, async (err, channel_fetch) => {
            
                if (err) throw err
                let channel_path = channel_fetch[0].path

                if(channel_path !== false && isValidURL(channel_path)) {
                    let channel_path_fetch = await axios.get(channel_path)
                    let channel_path_data = channel_path_fetch.data
                    let temp_channel_path_data = ''

                    ws.emit('channel_data', channel_path_data)
                    
                    let checkForUpdate = setInterval(async () => {
                        let is_emitted = false
                        let temp_channel_path_fetch = await axios.get(channel_path)
                        temp_channel_path_data = temp_channel_path_fetch.data
                        
                        if(temp_channel_path_data !== channel_path_data && !is_emitted){
                            channel_path_data = temp_channel_path_data
                            ws.emit('channel_data', channel_path_data)
                            is_emitted = true
                        }

                    }, zapwire_config.refreshRate)

                } else {
                    mysql_conn.query(`DELETE FROM zw_sessions WHERE token = '${session_token}'`, (err, result) => {
                        console.log("the client has disconnected")
                        ws.emit('error', 'Channel not found')
                        ws.emit('task', 'rewire')
                        ws.disconnect()
                    })
                    
                }
            })
        })
    });

    // handling what to do when clients disconnects from server
    ws.on("disconnect", () => {
        mysql_conn.query(`DELETE FROM zw_sessions WHERE token = '${current_session_token}'`, (err, result) => {
            console.log("the client has disconnected")
        })
    });

    // handling what to do when clients disconnects from server
    ws.on("error", () => {
        mysql_conn.query(`DELETE FROM zw_sessions WHERE token = '${current_session_token}'`, (err, result) => {
            console.log("error detected")
        })
    });
});
  
server.listen(PORT, () => {
    console.log('listening on ', PORT);
});

const isValidURL = (string) => {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
}

const generate_token = (length = 40) => {
    //edit the token allowed characters
    var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".split("");
    var b = [];  
    for (var i=0; i<length; i++) {
        var j = (Math.random() * (a.length-1)).toFixed(0);
        b[i] = a[j];
    }
    return b.join("");
}

console.log('Server started on port ' + PORT)