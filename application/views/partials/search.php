<!-- Search Form Drawer -->
    <div class="search">
        <div class="search__form">
            <!-- <form class="search-bar__form" action="#"> -->
            <form class="search-bar__form" id="frid" action="<?= base_url('search/') ?>" method="get">
                <button class="go-btn search__button" type="submit"><i class="icon an an-search"></i></button>
                <input class="search__input" type="search" name="name" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off" />
            </form>
            <button type="button" class="search-trigger close-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Close"><i class="icon an an-times"></i></button>
        </div>
    </div>
    <!-- End Search Form Drawer -->