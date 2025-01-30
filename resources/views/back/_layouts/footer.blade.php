<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
    <div class="content py-0">
        <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="javascript:void(0)" target="_self">Neinaa</a>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                <a class="fw-semibold" href="javascript:void(0)" target="_self">{{ config("app.name") }}</a> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>
    </div>
</footer>
<!-- END Footer -->
</div>

<script src="{{ url("assets/back/js/dashmix.app.min.js") }}"></script>
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ url("assets/back/js/lib/jquery.min.js") }}"></script>

<!-- Page JS Plugins -->
@stack("js")

</body>

</html>
