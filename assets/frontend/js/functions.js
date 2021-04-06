/* Preload */
const flashData = $(".flash-data").data("flashdata");
const flashDanger = $(".flash-danger").data("flashdata");

if (flashData) {
	Swal.fire({
		title: "Success",
		text: flashData,
		type: "success",
	});
}
if (flashDanger) {
	Swal.fire({
		title: "Warning",
		text: flashDanger,
		type: "warning",
	});
}

$(".cancelOrder").on("click", function (e) {
	e.preventDefault();
	var url = $(this).attr("href");
	Swal.fire({
		title: "Batalkan Pesanan ?",
		text: "Anda yakin untuk membatalkan pesanan ini",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, Batalkan!",
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
});
$(".detailOrder").on("click", function (e) {
	e.preventDefault();
	var idpesanan = $(this).data("idpesanan");
	$("#table-pemandu tr").remove();
	$.ajax({
		type: "GET",
		url: "http://localhost/skripsi_anggri/account/list-pemandu/" + idpesanan,
		// url: "https://skripsi-anggri.online/account/list-pemandu/" + idpesanan,
		dataType: "JSON",
		success: function (data) {
			if (data.length > 0) {
				for (var i = 0; i < data.length; i++) {
					$("#table-pemandu").append(
						"<tr>" +
							"<td><img class='thumbnail rounded-circle' src='http://localhost/skripsi_anggri/assets/frontend/img/pemandu/" +
							data[i]["photo"] +
							"'></td>" +
							"<td style='vertical-align:middle;'>" +
							data[i]["nama_pemandu"].toString().toUpperCase() +
							"</td>" +
							"<td style='vertical-align:middle;'>" +
							data[i]["no_hp_pemandu"] +
							"</td>" +
							"</tr>"
					);
				}
			} else {
				$("#table-pemandu").append(
					"<tr>" +
						"<td class='font-weight-bold'>Data pemandu kosong</td>" +
					"</tr>"
				);
			}
		},
	});
	var namawisata = $(this).data("namawisata");
	var blnwisata = $(this).data("blnwisata");
	var tglwisata = $(this).data("tglwisata");
	var hariwisata = $(this).data("hariwisata");
	var namapemesan = $(this).data("namapemesan");
	var nohppemesan = $(this).data("nohppemesan");
	var jmldewasa = $(this).data("jmldewasa");
	var jmlbalita = $(this).data("jmlbalita");
	var kodebooking = $(this).data("kodebooking");
	var statusbayar = $(this).data("statusbayar");
	var statuspesan = $(this).data("statuspesan");
	var tglpesanan = $(this).data("tglpesanan");
	var tgl_expired = $(this).data("tglexpired");
	var totalbayar = $(this).data("totalbayar");
	var dpbayar = $(this).data("dpbayar");
	var nominalterbayar = $(this).data("nominalterbayar");
	var tglbayar = $(this).data("tglbayar");
	var sisabayar = $(this).data("sisabayar");

	$("#kode_booking").html(kodebooking);
	$("#nama_wisata").html(namawisata);
	$("#nama_pemesan").html(namapemesan);
	$("#no_hp_pemesan").html(nohppemesan);
	$("#tgl_pesanan").html(tglpesanan);
	$("#tgl_pesanan").html(tglpesanan);
	$("#jml_dewasa").html(jmldewasa + " Orang");
	$("#jml_balita").html(jmlbalita + " Orang");
	$("#total_bayar").html("Rp. " + totalbayar);
	$("#bulan_wisata").html(blnwisata);
	$("#tanggal_wisata").html(tglwisata);
	$("#hari_wisata").html(hariwisata);
	$("#dp_bayar").html("Rp. " + dpbayar);
	$("#tgl_bayar").html(tglbayar);
	$("#terbayar").html("Rp. " + nominalterbayar);
	$("#sisa_bayar").html("Rp. " + sisabayar);

	if (statuspesan == "booking") {
		$("#status_pesan").html("BOOKING");
		$("#status_pesan").removeClass("badge-danger");
		$("#status_pesan").removeClass("badge-success");
		$("#status_pesan").removeClass("badge-warning");
		$("#status_pesan").addClass("badge-info");
	} else if (statuspesan == "batal") {
		$("#status_pesan").html("BATAL");
		$("#status_pesan").removeClass("badge-info");
		$("#status_pesan").removeClass("badge-success");
		$("#status_pesan").removeClass("badge-warning");

		$("#status_pesan").addClass("badge-danger");
	} else if (statuspesan == "expired") {
		$("#status_pesan").html("EXPIRED");
		$("#status_pesan").removeClass("badge-danger");
		$("#status_pesan").removeClass("badge-success");
		$("#status_pesan").removeClass("badge-info");

		$("#status_pesan").addClass("badge-warning");
	} else {
		$("#status_pesan").html("SELESAI");
		$("#status_pesan").removeClass("badge-danger");
		$("#status_pesan").removeClass("badge-info");
		$("#status_pesan").removeClass("badge-warning");
		$("#status_pesan").addClass("badge-success");
	}

	if (statusbayar == "") {
		$("#status_bayar").html("BELUM BAYAR");
		$("#status_bayar").removeClass("badge-success");
		$("#status_bayar").removeClass("badge-warning");
		$("#status_bayar").addClass("badge-danger");
	} else if (statusbayar == "dp") {
		$("#status_bayar").html("DP");
		$("#status_bayar").removeClass("badge-success");
		$("#status_bayar").removeClass("badge-danger");
		$("#status_bayar").addClass("badge-warning");
	} else {
		$("#status_bayar").html("LUNAS");
		$("#terbayar").html("Rp." + totalbayar);
		$("#status_bayar").removeClass("badge-danger");
		$("#status_bayar").removeClass("badge-warning");
		$("#status_bayar").addClass("badge-success");
	}

	if (statusbayar == "" && statuspesan == "booking") {
		$("#row_expired").css("background-color", "wheat");
		$("#bayar_sebelum_text").html("Bayar Sebelum");
		$("#bayar_sebelum_tgl").html(tgl_expired);
	} else {
		$("#row_expired").css("background-color", "white");
		$("#bayar_sebelum_text").html("");
		$("#bayar_sebelum_tgl").html("");
	}
});

$(window).load(function () {
	// makes sure the whole site is loaded
	$("#status").fadeOut(); // will first fade out the loading animation
	$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
	$("body").delay(350).css({
		overflow: "visible",
	});
	$(window).scroll();
});

/* Sticky nav */
$(window).scroll(function () {
	"use strict";
	if ($(this).scrollTop() > 1) {
		$("header").addClass("sticky");
	} else {
		$("header").removeClass("sticky");
	}
});

/* Menu */
$("a.open_close").on("click", function () {
	$(".main-menu").toggleClass("show");
	$(".layer").toggleClass("layer-is-visible");
});
$("a.show-submenu").on("click", function () {
	$(this).next().toggleClass("show_normal");
});
$("a.show-submenu-mega").on("click", function () {
	$(this).next().toggleClass("show_mega");
});
if ($(window).width() <= 480) {
	$("a.open_close").on("click", function () {
		$(".cmn-toggle-switch").removeClass("active");
	});
}

/* Collapse filters */
if ($(this).width() < 991) {
	$(".collapse#collapseFilters").removeClass("show");
} else {
	$(".collapse#collapseFilters").addClass("show");
}

/* Overaly mask form */
$(".expose").on("click", function (e) {
	"use strict";
	$(this).css("z-index", "4");
	$("#overlay").fadeIn(300);
});
$("#overlay").click(function (e) {
	"use strict";
	$("#overlay").fadeOut(300, function () {
		$(".expose").css("z-index", "3");
	});
});

/* Tooltip */
$(".tooltip-1").tooltip({
	html: true,
});

/* Accordion */
function toggleChevron(e) {
	$(e.target)
		.prev(".card-header")
		.find("i.indicator")
		.toggleClass("icon-minus icon-plus");
}
$(".accordion_styled").on(
	"hidden.bs.collapse shown.bs.collapse",
	toggleChevron
);
function toggleIcon(e) {
	$(e.target)
		.prev(".card-header")
		.find(".indicator")
		.toggleClass("icon-minus icon-plus");
}

/* Button show/hide map */
$(".btn_map").on("click", function () {
	var el = $(this);
	el.text() == el.data("text-swap")
		? el.text(el.data("text-original"))
		: el.text(el.data("text-swap"));
});

/* Animation on scroll */
new WOW().init();

/* Video modal dialog + Parallax + Scroll to top + Incrementer */
$(function () {
	"use strict";
	$(".parallax-window").parallax({ zIndex: 1 }); /* Parallax modal*/

	$(".video").magnificPopup({
		type: "iframe",
		closeMarkup:
			'<button title="%title%" type="button" class="mfp-close" style="font-size:21px">&#215;</button>',
	}); /* video modal*/

	/*  Image popups */
	$(".magnific-gallery").each(function () {
		$(this).magnificPopup({
			delegate: "a",
			type: "image",
			preloader: true,
			gallery: {
				enabled: true,
			},
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function () {
					// just a hack that adds mfp-anim class to markup
					this.st.image.markup = this.st.image.markup.replace(
						"mfp-figure",
						"mfp-figure mfp-with-anim"
					);
					this.st.mainClass = this.st.el.attr("data-effect");
				},
			},
			closeOnContentClick: true,
			midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	});

	/* Cart header drop down */
	$(".dropdown-menu").on("click", function (e) {
		e.stopPropagation();
	});
	$("ul#top_tools li .dropdown").hover(
		function () {
			$(this).find(".dropdown-menu").stop(true, true).delay(50).fadeIn(300);
		},
		function () {
			$(this).find(".dropdown-menu").stop(true, true).delay(50).fadeOut(300);
		}
	);

	/* Hamburger icon */
	var toggles = document.querySelectorAll(".cmn-toggle-switch");
	for (var i = toggles.length - 1; i >= 0; i--) {
		var toggle = toggles[i];
		toggleHandler(toggle);
	}
	function toggleHandler(toggle) {
		toggle.addEventListener("click", function (e) {
			e.preventDefault();
			this.classList.contains("active") === true
				? this.classList.remove("active")
				: this.classList.add("active");
		});
	}

	/* Scroll to top*/
	var pxShow = 800; // height on which the button will show
	var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.

	$(window).scroll(function () {
		if ($(window).scrollTop() >= pxShow) {
			$("#toTop").addClass("visible");
		} else {
			$("#toTop").removeClass("visible");
		}
	});

	$("#toTop").on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, scrollSpeed);
		return false;
	});

	/* Input incrementer*/
	$(".numbers-row").append(
		'<div class="inc button_inc">+</div><div class="dec button_inc">-</div>'
	);
	$(".button_inc").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		var inputName = $button.parent().find("input").attr("name");
		var hargaDewasa = $("[name=harga_dewasa]").val();
		var hargaBalita = $("[name=harga_balita]").val();
		var total_dewasa = 0;
		var total_balita = 0;
		console.log(hargaDewasa);
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		if (newVal > 0) {
			if (inputName == "jml_dewasa") {
				$("#subjml_dewasa_dis").html(newVal);
				$("#subtotal_dewasa").val(parseInt(newVal) * parseInt(hargaDewasa));
				$("#sub_dewasa_dis").html(
					format_rupiah(parseInt(newVal) * parseInt(hargaDewasa))
				);
			} else {
				$("#subjml_balita_dis").html(newVal);
				$("#subtotal_balita").val(parseInt(newVal) * parseInt(hargaBalita));
				$("#sub_balita_dis").html(
					format_rupiah(parseInt(newVal) * parseInt(hargaBalita))
				);
			}
			$("#total_harga").html(
				format_rupiah(
					parseInt($("#subtotal_dewasa").val()) +
						parseInt($("#subtotal_balita").val())
				)
			);
		} else {
			if (inputName == "jml_dewasa") {
				$("#subjml_dewasa_dis").html(0);
				$("#subtotal_dewasa").val(0);
				$("#sub_dewasa_dis").html(format_rupiah(0));
			} else {
				$("#subjml_balita_dis").html(0);
				$("#subtotal_balita").val(0);
				$("#sub_balita_dis").html(format_rupiah(0));
			}
			$("#total_harga").html(
				format_rupiah(
					parseInt($("#subtotal_dewasa").val()) +
						parseInt($("#subtotal_balita").val())
				)
			);
		}
		$button.parent().find("input").val(newVal);
	});
});
function format_rupiah(rupiah) {
	var cur_rupiah = new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
	}).format(rupiah);
	return cur_rupiah;
}
$("#submitBook").on("click", function (e) {
	var min_orang = $("#min_orang").val();
	var jml_dewasa = $("#jml_dewasa").val();
	var jml_balita = $("#jml_balita").val();
	var jml_orang = parseInt(jml_dewasa) + parseInt(jml_balita);
	if (jml_orang < min_orang) {
		e.preventDefault();
		Swal.fire({
			title: "Uppss",
			text: "Total wisatawan minimal " + min_orang + " orang",
			icon: "warning",
			type: "warning",
			confirmButtonText: "Oke",
		});
	}
});
/* Cat nav onclick active */
$("ul#cat_nav li a").on("click", function () {
	$("ul#cat_nav li a.active").removeClass("active");
	$(this).addClass("active");
});

/* Map filter onclick active */
$("#map_filter ul li a").on("click", function () {
	$("#map_filter ul li a.active").removeClass("active");
	$(this).addClass("active");
});

/* Input range slider */
$(function () {
	"use strict";
	$("#range").ionRangeSlider({
		hide_min_max: true,
		keyboard: true,
		min: 50000,
		max: 2000000,
		from: 50000,
		to: 1000000,
		type: "double",
		step: 1,
		prefix: "Rp. ",
		grid: true,
	});
});

/* Footer reveal */
if ($(window).width() >= 768) {
	$("footer.revealed").footerReveal({
		shadow: false,
		opacity: 0.6,
		zIndex: 0,
	});
}

/* Search */
$(".search-overlay-menu-btn").on("click", function (a) {
	$("body").addClass("has-fullscreen-modal");
	$(".search-overlay-menu").addClass("open"),
		$('.search-overlay-menu > form > input[type="search"]').focus();
}),
	$(".search-overlay-close").on("click", function (a) {
		$(".search-overlay-menu").removeClass("open");
		$("body").removeClass("has-fullscreen-modal");
	}),
	$(".search-overlay-menu, .search-overlay-menu .search-overlay-close").on(
		"click keyup",
		function (a) {
			(a.target == this ||
				"search-overlay-close" == a.target.className ||
				27 == a.keyCode) &&
				$(this).removeClass("open");
		}
	);

/* Date and time picker v2 */
$(".booking_date").dateDropper();
$(".booking_time").timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#e74e84",
	borderColor: "#e74e84",
	minutesInterval: "15",
});

/* Modal Sign In */
$("#access_link").magnificPopup({
	type: "inline",
	fixedContentPos: true,
	fixedBgPos: true,
	overflowY: "auto",
	closeBtnInside: true,
	preloader: false,
	midClick: true,
	removalDelay: 300,
	mainClass: "my-mfp-zoom-in",
});

/* Show Password */
$("#password").hidePassword("focus", {
	toggle: {
		className: "my-toggle",
	},
});

/* Forgot Password */
$("#forgot").click(function () {
	$("#forgot_pw").fadeToggle("fast");
});

/* Check box modal */
$("#remember-me").iCheck({
	checkboxClass: "icheckbox_square-grey",
	radioClass: "iradio_square-grey",
});

/* Opacity mask */
$(".opacity-mask").each(function () {
	$(this).css("background-color", $(this).attr("data-opacity-mask"));
});

/* Carousel home */
$("#carousel-home .owl-carousel").on("initialized.owl.carousel", function () {
	setTimeout(function () {
		$(
			"#carousel-home .owl-carousel .owl-item.active .owl-slide-animated"
		).addClass("is-transitioned");
		$("section").show();
	}, 200);
});

const $owlCarousel = $("#carousel-home .owl-carousel").owlCarousel({
	items: 1,
	loop: true,
	nav: false,
	dots: true,
	responsive: {
		0: {
			dots: false,
		},
		767: {
			dots: false,
		},
		768: {
			dots: true,
		},
	},
});

$owlCarousel.on("changed.owl.carousel", function (e) {
	$(".owl-slide-animated").removeClass("is-transitioned");
	const $currentOwlItem = $(".owl-item").eq(e.item.index);
	$currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");
});

$owlCarousel.on("resize.owl.carousel", function () {
	setTimeout(function () {}, 50);
});

// Carousel
$(".list_carousel").owlCarousel({
	center: false,
	items: 2,
	loop: false,
	margin: 0,
	dots: false,
	nav: true,
	navText: [
		"<i class='arrow_carrot-left'></i>",
		"<i class='arrow_carrot-right'></i>",
	],
	responsive: {
		0: {
			nav: false,
			dots: true,
			items: 1,
		},
		768: {
			nav: false,
			dots: true,
			items: 2,
		},
		1024: {
			items: 3,
		},
	},
});

// Carousel
$(".carousel_item").owlCarousel({
	center: false,
	items: 1,
	lazyLoad: true,
	loop: false,
	margin: 0,
	dots: false,
	nav: true,
	navText: [
		"<i class='arrow_carrot-left'></i>",
		"<i class='arrow_carrot-right'></i>",
	],
});

// Panel Dropdown
function close_panel_dropdown() {
	$(".panel-dropdown").removeClass("active");
}
$(".panel-dropdown a").on("click", function (e) {
	if ($(this).parent().is(".active")) {
		close_panel_dropdown();
	} else {
		close_panel_dropdown();
		$(this).parent().addClass("active");
	}
	e.preventDefault();
});

// Closes dropdown on click outside the conatainer
var mouse_is_inside = false;

$(".panel-dropdown").hover(
	function () {
		mouse_is_inside = true;
	},
	function () {
		mouse_is_inside = false;
	}
);

$("body").mouseup(function () {
	if (!mouse_is_inside) close_panel_dropdown();
});
