<footer class="text-center bg-secondary text-white <?= (isset($_COOKIE['css']) && $_COOKIE['css'] == 'light') ? 'footer_light bg-light text-dark' : 'footer-dark bg-dark' ?> py-3">
    <div class="container">

        <p class="mb-0">webVillas &copy; <?= date('Y') ?></p>
        <p class="small mb-0">Developed by Nefeli Karanikola</p>
    </div>
</footer>
