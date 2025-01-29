  <!-- Pop In Block Modal -->
  <div class="modal fade modal-lg" id="role-info" tabindex="-1" role="dialog" aria-labelledby="role-info" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popin" role="document">
          <div class="modal-content">
              <div class="block block-rounded block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">{{ __("members.role_member_info") }}</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                      <div class="spiner-container text-center d-flex justify-content-center gap-2">
                          <h6 class="mb-2">{{ __("global.please_wait") }}</h6>
                          <div class="spiners mb-2">
                              <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div>
                              <div class="spinner-grow spinner-grow-sm text-secondary" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div>
                              <div class="spinner-grow spinner-grow-sm text-success" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div>
                          </div>
                      </div>

                      <div id="role-information">

                      </div>
                  </div>
                  <div class="block-content block-content-full text-end bg-body">
                      <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">{{ __("global.close") }}</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- END Pop In Block Modal -->
