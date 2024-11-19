<div class="dropdown">
  <button class="btn btn-light dropdown-toggle mx-lg-2 text-capitalize" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-person-circle me-2"></i> <?=getLoginUser()?>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="php/auth/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
  </ul>
</div>