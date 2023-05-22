<?php 
if(isset($_SESSION['status'])){
?>
<div class="alert alert-<?= $_SESSION['status']==1 ? 'success': 'danger';?> alert-dismissible" role="alert">
    <?= $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['status']);
}?>