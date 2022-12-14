<!-- Forgot Password -->
<div class="card">
            <div class="card-body flex-column justify-content-center">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo" style="height:25px;">
                 <img src="<?= $app->url($app->project_info['logos']['z2']) ?>" alt="<?= $app->url($app->project_info['app_name']) ?>" height="100%" />

                  </span>
                </a>
              </div>
              <!-- /Logo -->
              
              <!-- display a responsive image here -->
              <div class="col-md-6 m-auto flex-column justify-content-center">
              <img class="mt-4 mb-4" src="<?= $app->url($app->project_info['images']['not-found']) ?>" alt="<?= $app->url($app->project_info['app_name']) ?>" width="100%" />
              
              </div>
              <h4 class="mb-2">404: Page Not Found.</h4>

              <p class="mb-4">
                The page you are looking for might have been removed had its name changed or is temporarily unavailable.
              </p>
              
              <div class="text-center">
                <a href="javascript:void(0)" onclick="history.back()" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Go back
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->