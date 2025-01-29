  <!-- Pop In Block Modal -->
  <div class="modal fade" id="delete-record" tabindex="-1" role="dialog" aria-labelledby="delete-record" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popin  modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="block block-rounded block-themed block-transparent mb-0">
                  <div class="block-header bg-primary-dark">
                      <h3 class="block-title">{{ __("global.modal_header_title") }}</h3>
                      <div class="block-options">
                          <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="block-content">
                      <p>{{ __("global.delete_confirm") }}</p>
                      <form action="" id="form-delete" method="POST">
                          @csrf
                          @method("DELETE")
                      </form>
                  </div>
                  <div class="block-content block-content-full text-end bg-body">
                      <button type="button" class="btn btn-sm btn-danger" id="submit-form">{{ __("global.delete") }}</button>
                      <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">{{ __("global.close") }}</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- END Pop In Block Modal -->


  @push('js')
  <script>
      $(() => {
          const form = $("#form-delete");
          const submit_btn = $("#submit-form");

          $("body").on("click",".delete-record-btn", function() {
              const url = $(this).data("url");
              form.attr("action", url);
          });

          submit_btn.on("click",function(){
            form.submit();
          })
      })
  </script>
  @endpush
