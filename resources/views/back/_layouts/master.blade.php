@include('back._layouts.header')

<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

    @include('back._layouts._sidebar.nav')

    @include('back._layouts._sidebar.header')

    <!-- Main Container -->
    <main id="main-container">
      @yield("content")
    </main>
    <!-- END Main Container -->

@include('back._layouts.footer')


