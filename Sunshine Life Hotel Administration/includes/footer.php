<footer class="footer mt-auto py-3 bg-dark <?php if(PAGE=='payment success') {echo 'd-none';}?>" id="footer">
    <div class="container">
        <span class="text-muted">Copyright © at
            <?php echo date("Y");?> as sunshinelife.com All rights reserved.
            <span class="footer-icons"
            id="facebook"><a class="text-muted" href="https://www.facebook.com/profile.php?id=100008315746814" target="_blank"><i class="fab fa-facebook"></i></a></span><span class="footer-icons" id="instagram"><a href="https://www.instagram.com/amit_jha_786/" class="text-muted" target="_blank"><i
            class="fab fa-instagram"></i></a></span><span class="footer-icons" id="twitter"><a href="https://twitter.com/BillGates?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="text-muted" target="_blank"><i
            class="fab fa-twitter"></i></a></span><span class="footer-icons" id="youtube"><a href="https://www.youtube.com/c/CodeWithHarry" class="text-muted" target="_blank"><i class="fab fa-youtube"></i></a></span>
        </span>
        <a href="<?php echo 'admin/admin_login.php';?>" target="_blank" class="<?php if(isset($_SESSION['is_login'])) {echo " d-none";}?>"><small>Admin Login</small></a>
    </div>
</footer>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
<script src="JS/script.js"></script>
</body>

</html>