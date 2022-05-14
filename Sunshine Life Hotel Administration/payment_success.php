<?php
    define("PAGE", "payment success");
    define("TITLE", "Sunshine Life Hotel - Payment Success Section");
    include "includes/header.php";
    include "conn.php";    
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="paid-success-btn" data-bs-toggle="modal" data-bs-target="#paidModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="paidModal" tabindex="-1" aria-labelledby="paidModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paidModalLabel">Payment Info</h5>
      </div>
      <div class="modal-body">
        Successfully Paid
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-primary">Back to Home</a>
      </div>
    </div>
  </div>
</div>
<?php
    include "includes/footer.php";
?>