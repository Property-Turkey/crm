<!-- Add Modal -->
<div class="modal fade" id="subModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="listing-modal modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
          <div ng-if="!rec.sale.id">
            <?= __('add') ?>
          </div>
          <div ng-if="rec.sale.id">
            <?= __('edit') ?>
          </div>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="elementsContainer">

          <!-- elements will get appended in here -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    function setCZIndex() {
      var viewSaleModal = $("#viewSale_mdl");
        viewSaleModal.css("z-index", "");
    }
    
    $("#closeModal").on("click", function() {
        setCZIndex();
    });

    // Remove z-index when modal is hidden
    $("#subModal").on("hidden.bs.modal", function () {
      setCZIndex();
    });

  });
</script>
