<section class="parallax-window" data-parallax="scroll" data-image-src="<?= base_url('assets/frontend/') ?>img/banner/banner1.jpg" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
            <h1><?= $title ?></h1>
            <p>Berbagai tujuan dan kategori dengan harga terjangkau</p>
        </div>
    </div>
</section>
<!-- End section -->
<?php
function hitung_kategori($wisata, $kategori)
{
    $jml_kategori = array_filter($wisata, function ($var) use ($kategori) {
        return ($var['kategori_wisata'] == $kategori);
    });
    echo count($jml_kategori);
}
?>
<main>

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Wisata</a></li>
                <li><?= ucwords($title) ?></li>
            </ul>
        </div>
    </div>
    <!-- Position -->

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->
    <div class="container margin_60">
        <div class="row">
            <aside class="col-lg-3">

                <div class="box_style_cat">
                    <ul id="cat_nav">
                        <li><a href="<?= base_url('wisata') ?>" id="active"><i class="icon_set_1_icon-51"></i>Semua kategori <span>(<?= count($wisata2) ?>)</span></a>
                        </li>
                        <?php foreach ($kategori as $k) { ?>
                            <li><a href="<?= base_url('wisata/kategori/' . strtolower(str_replace(' ', '-', $k['kategori']))) ?>"><i class="icon-angle-double-right"></i><?= ucwords($k['kategori']) ?> <span>(<?php hitung_kategori($wisata2, $k['kategori']) ?>)</span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filter</a>
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Harga</h6>
                            <input type="text" id="range" name="range" value="">
                            <small class="text-danger">perorang</small>
                        </div>
                    </div>
                    <!--End collapse -->
                </div>
                <!--End filters col-->
                <div class="box_style_2">
                    <i class="icon_set_1_icon-57"></i>
                    <h4>Butuh <span>Bantuan ?</span></h4>
                    <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                    <small>Senin - Minggu 09.00 - 22.00 WIB</small>
                </div>
            </aside>
            <!--End aside -->
            <div class="col-lg-9">
                <?php if (isset($_POST['keyword'])) { ?>

                    <p class="h6 mb-2">Hasil Pencarian : <span class="font-weight-bold font-italic">"<?= $this->input->post('keyword') ?>"</span></p>

                <?php } ?>
                <div id="tools">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-6">
                            <div class="styled-select-filters">
                                <select name="sort_price" id="sort_price">
                                    <option value="" selected>Sort by price</option>
                                    <option value="lower">Lowest price</option>
                                    <option value="higher">Highest price</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">
                            <div class="styled-select-filters">
                                <select name="sort_rating" id="sort_rating">
                                    <option value="" selected>Sort by ranking</option>
                                    <option value="lower">Lowest ranking</option>
                                    <option value="higher">Highest ranking</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <!--/tools -->
                <?php
                $i = 1;
                foreach ($wisata as $w) { ?>
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.<?= $i ?>s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="img_list">
                                    <a href="<?= base_url('wisata/' . $w['slug']) ?>"><img src="<?= base_url('assets/frontend/') ?>img/wisata/<?= $w['gambar_wisata'] ?>" alt="Image">
                                        <div class="short_info"><i class="icon-tags-1"></i><?= ucwords($w['kategori_wisata']) ?> </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="tour_list_desc">
                                    <h3><strong><?= strtoupper($w['nama_wisata']) ?></strong></h3>
                                    <p align="justify"><?= substr($w['deskripsi'], 0, 400) . '...' ?></p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="price_list">
                                    <div><span class="h6 font-weight-bold">Rp. <?= format_rupiah($w['harga_wisata']) ?></span><small>/orang</small>
                                        <p><a href="<?= base_url('wisata/' . $w['slug']) ?>" class="btn_1">Detail</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End strip -->
                <?php $i++;
                } ?>
                <hr>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- end pagination-->

            </div>
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</main>
<!-- End main -->