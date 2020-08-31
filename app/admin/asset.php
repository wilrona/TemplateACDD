<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 03/10/2017
 * Time: 12:07
 */

# ajout des elements css et js dans mon template
function themeprefix_bootstrap_modals()
{



    wp_register_script('popper', get_stylesheet_directory_uri() . '/dependencies/popper.js/popper.min.js', '', '1', true);
    wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/dependencies/bootstrap/js/bootstrap.min.js', '', '1', true);
    wp_register_script('swiper', get_stylesheet_directory_uri() . '/dependencies/swiper/js/swiper.jquery.min.js', '', '1', true);
    wp_register_script('swiperRunner', get_stylesheet_directory_uri() . '/dependencies/swiperRunner/js/swiperRunner.min.js', '', '1', true);
    wp_register_script('appear', get_stylesheet_directory_uri() . '/dependencies/jquery.appear/jquery.appear.js', '', '1', true);
    wp_register_script('datepicker', get_stylesheet_directory_uri() . '/dependencies/air-datepicker/js/datepicker.min.js', '', '1', true);
    wp_register_script('datepickerFr', get_stylesheet_directory_uri() . '/dependencies/air-datepicker/js/datepicker.en.js', '', '1', true);
    wp_register_script('magnific-popup', get_stylesheet_directory_uri() . '/dependencies/magnific-popup/js/jquery.magnific-popup.min.js', '', '1', true);
    wp_register_script('imagesloaded', get_stylesheet_directory_uri() . '/dependencies/imagesloaded/imagesloaded.pkgd.min.js', '', '1', true);
    wp_register_script('isotope', get_stylesheet_directory_uri() . '/dependencies/isotope-layout/isotope.pkgd.min.js', '', '1', true);
    wp_register_script('parallax', get_stylesheet_directory_uri() . '/dependencies/jquery.parallax-scroll/jquery.parallax-scroll.js', '', '1', true);
    wp_register_script('wow', get_stylesheet_directory_uri() . '/dependencies/wow/js/wow.min.js', '', '1', true);
    wp_register_script('jarallax', get_stylesheet_directory_uri() . '/assets/js/jarallax.min.js', '', '1', true);

    wp_register_script('app', get_stylesheet_directory_uri() . '/assets/js/app.js', '', '1', true);


    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/dependencies/bootstrap/css/bootstrap.min.css', '', '', 'all');
    wp_register_style('all', get_stylesheet_directory_uri() . '/dependencies/fontawesome/css/all.min.css', '', '', 'all');
    wp_register_style('swiper', get_stylesheet_directory_uri() . '/dependencies/swiper/css/swiper.min.css', '', '', 'all');
    wp_register_style('animate', get_stylesheet_directory_uri() . '/dependencies/wow/css/animate.css', '', '', 'all');
    wp_register_style('magnific-popup', get_stylesheet_directory_uri() . '/dependencies/magnific-popup/css/magnific-popup.css', '', '', 'all');
    wp_register_style('themify', get_stylesheet_directory_uri() . '/dependencies/themify-icons/css/themify-icons.css', '', '', 'all');
    wp_register_style('elegant', get_stylesheet_directory_uri() . '/dependencies/components-elegant-icons/css/elegant-icons.min.css', '', '', 'all');
    wp_register_style('datepicker', get_stylesheet_directory_uri() . '/dependencies/air-datepicker/css/datepicker.min.css', '', '', 'all');

    wp_register_style('flaticon', get_stylesheet_directory_uri() . '/assets/custom-font/flaticon.css', '', '', 'all');
    wp_register_style('app', get_stylesheet_directory_uri() . '/assets/css/app.css', '', '', 'all');



    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('swiper');
    wp_enqueue_script('swiperRunner');
    wp_enqueue_script('appear');
    wp_enqueue_script('datepicker');
    wp_enqueue_script('datepickerFr');
    wp_enqueue_script('magnific-popup');
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('isotope');
    wp_enqueue_script('parallax');
    wp_enqueue_script('wow');
    wp_enqueue_script('jarallax');
    wp_enqueue_script('app');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('all');
    wp_enqueue_style('swiper');
    wp_enqueue_style('animate');
    wp_enqueue_style('magnific-popup');
    wp_enqueue_style('themify');
    wp_enqueue_style('elegant');
    wp_enqueue_style('datepicker');
    wp_enqueue_style('flaticon');
    wp_enqueue_style('app');
}

add_action('wp_enqueue_scripts', 'themeprefix_bootstrap_modals');

function load_custom_wp_admin_asset()
{
    wp_register_script('admin', get_stylesheet_directory_uri() . '/js/admin.js', '', '1.1', true);
    wp_enqueue_script('admin');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_asset');


// Ajout de select 2 dans l'interface d'administration
function enqueue_select2_jquery()
{
    wp_register_style('select2css', get_stylesheet_directory_uri() . '/css/select2.css', false, '1.0', 'all');
    wp_register_script('select2', get_stylesheet_directory_uri() . '/js/select2.min.js', '', '1.0', true);
    wp_enqueue_style('select2css');
    wp_enqueue_script('select2');
}
add_action('admin_enqueue_scripts', 'enqueue_select2_jquery');

function select2jquery_inline()
{
    ?>
    <!--	<style type="text/css">-->
    <!--		.select2-container {margin: 0 2px 0 2px;}-->
    <!--		.tablenav.top #doaction, #doaction2, #post-query-submit {margin: 0px 4px 0 4px;}-->
    <!--	</style>-->
    <script type='text/javascript'>
        jQuery(document).ready(function($) {
            if ($('select.select').length > 0) {
                $('select.select').select2();
            }
        });
    </script>
<?php
}
add_action('admin_head', 'select2jquery_inline');



function select2jquery_inline_frontend()
{
    ?>
    <!--    	<style type="text/css">-->
    <!--    		.select2-container {margin: 0 2px 0 2px;}-->
    <!--    		.tablenav.top #doaction, #doaction2, #post-query-submit {margin: 0px 4px 0 4px;}-->
    <!--            .select2 {-->
    <!--                width:100%!important;-->
    <!--            }-->
    <!--    	</style>-->
    <script type='text/javascript'>
        jQuery(document).ready(function($) {
            if ($('select.selected').length > 0) {
                $('select.selected').select2();
                //                $( document.body ).on( "click", function() {
                //                    $( 'select' ).select2();
                //                });
            }

            if ($('select.selectedComp').length > 0) {
                $('select.selectedComp').select2({
                    maximumSelectionLength: 10
                });
                //                $( document.body ).on( "click", function() {
                //                    $( 'select' ).select2();
                //                });
            }
        });

        jQuery(document).ready(function() {

            window.initDataTable = function() {

                var settings = {
                    "destroy": true,
                    "scrollCollapse": true,
                    "searching": true,
                    "language": {
                        "processing": "Traitement en cours...",
                        "search": "",
                        "searchPlaceholder": "Filtre par annee",
                        "lengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                        "info": "Affichage de  _START_ &agrave; _END_ sur _TOTAL_ ",
                        "infoEmpty": "Affichage de 0 &agrave; 0 sur 0 ",
                        "infoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        "infoPostFix": "",
                        "loadingRecords": "Chargement en cours...",
                        "zeroRecords": "<h3 class='uk-margin-top uk-margin-bottom'>Aucun &eacute;l&eacute;ment &agrave; afficher</h3>",
                        "emptyTable": "<h3 class='uk-margin-top uk-margin-bottom'>Aucune donn&eacute;e disponible</h3>",
                        "paginate": {
                            "first": "",
                            "previous": "",
                            "next": "",
                            "last": ""
                        },
                        "aria": {
                            "sortAscending": ": activer pour trier la colonne par ordre croissant",
                            "sortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                        }
                    },
                    "pageLength": 25,
                    "columnDefs": [{
                            "orderable": false,
                            "searchable": false,
                            "targets": 2
                        },
                        {
                            "orderable": true,
                            "searchable": false,
                            "targets": 0
                        }
                    ]

                }

                jQuery('.dataTable').dataTable(settings);
            }

            initDataTable();


        });
    </script>
<?php
}
add_action('wp_enqueue_scripts', 'enqueue_select2_jquery');
// add_action('wp_footer', 'select2jquery_inline_frontend');


function datepicker()
{
    wp_register_style('datepickercss', get_stylesheet_directory_uri() . '/css/datepicker.css', false, '1.0', 'all');
    wp_register_script('datepicker', get_stylesheet_directory_uri() . '/js/datepicker.js', '', '1.0', true);
    wp_register_script('datepicker.fr', get_stylesheet_directory_uri() . '/js/datepicker.fr-FR.js', '', '1.0', true);
    wp_register_script('repeater', get_stylesheet_directory_uri() . '/js/jquery.repeater.js', array('jquery'), '1.0', true);
    wp_enqueue_style('datepickercss');
    wp_enqueue_script('datepicker');
    wp_enqueue_script('datepicker.fr');
    wp_enqueue_script('repeater');
}

// add_action('wp_enqueue_scripts', 'datepicker');
add_action('admin_enqueue_scripts', 'datepicker');

function datepicker_script()
{
    ?>

    <script type='text/javascript'>
        jQuery(document).ready(function($) {
            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker({
                    language: 'fr-FR',
                    format: 'dd/mm/yyyy',
                    autoHide: true
                });
            }

            if ($('.datepicker_birth').length > 0) {
                $('.datepicker_birth').datepicker({
                    language: 'fr-FR',
                    format: 'dd/mm/yyyy',
                    startView: 2,
                    autoHide: true
                });
            }

            if ($('.datepicker_start').length > 0) {
                $('.datepicker_start').datepicker({
                    language: 'fr-FR',
                    format: 'dd/mm/yyyy',
                    startView: 2,
                    autoHide: true,
                    pick: function(date) {
                        $date_end = $(date.currentTarget).parent().next().find('input.datepicker_end');
                        $reforme_date_start_show = ('0' + date.date.getDate()).slice(-2) + '/' + ('0' + (date.date.getMonth() + 1)).slice(-2) + '/' + date.date.getFullYear();
                        $reforme_date_start = '' + ('0' + (date.date.getMonth() + 1)).slice(-2) + '/' + date.date.getDate() + '/' + date.date.getFullYear();

                        if ($date_end) {

                            $reforme_date_end = "";

                            if ($date_end.val() === '') {
                                $date_end.val($reforme_date_start_show);
                            } else {
                                date_end_js = $date_end.val().split('/');
                                $reforme_date_end = (date_end_js[1]) + '/' + date_end_js[0] + '/' + date_end_js[2];
                            }

                            if (new Date($reforme_date_start) >= new Date($reforme_date_end)) {
                                $date_end.val($reforme_date_start_show);
                            }
                        }
                    }
                });
            }

            if ($('.datepicker_end').length > 0) {
                $('.datepicker_end').datepicker({
                    language: 'fr-FR',
                    format: 'dd/mm/yyyy',
                    startView: 2,
                    autoHide: true,
                    pick: function(date) {
                        $date_start = $(date.currentTarget).parent().prev().find('input.datepicker_start');
                        $reforme_date_end_show = ('0' + date.date.getDate()).slice(-2) + '/' + ('0' + (date.date.getMonth() + 1)).slice(-2) + '/' + date.date.getFullYear();
                        $reforme_date_end = '' + ('0' + (date.date.getMonth() + 1)).slice(-2) + '/' + date.date.getDate() + '/' + date.date.getFullYear();

                        if ($date_start) {

                            $reforme_date_start = "";

                            if ($date_start.val() === '') {
                                $date_start.val($reforme_date_end_show);
                            } else {
                                date_start_js = $date_start.val().split('/');
                                $reforme_date_start = (date_start_js[1]) + '/' + date_start_js[0] + '/' + date_start_js[2];
                            }


                            if (new Date($reforme_date_end) <= new Date($reforme_date_start)) {
                                $date_start.val($reforme_date_end_show);
                            }
                        }
                    }
                });
            }

            if ($('.datepicker_year_start').length > 0) {
                $('.datepicker_year_start').datepicker({
                    language: 'fr-FR',
                    format: 'yyyy',
                    startView: 2,
                    autoHide: true,
                    pick: function(date) {

                        if ($('.datepicker_year_end')) {

                            if ($('.datepicker_year_end').val() === '') {
                                $('.datepicker_year_end').val(date.date.getFullYear() + 1);
                            }

                            if (parseFloat(date.date.getFullYear()) >= parseInt($('.datepicker_year_end').val())) {

                                $('.datepicker_year_end').val(date.date.getFullYear() + 1);
                            }
                        }

                    }
                })
            }

            if ($('.datepicker_year_end').length > 0) {
                $('.datepicker_year_end').datepicker({
                    language: 'fr-FR',
                    format: 'yyyy',
                    startView: 2,
                    autoHide: true,
                    pick: function(date) {
                        if ($('.datepicker_year_start')) {

                            if ($('.datepicker_year_start').val() === '') {
                                $('.datepicker_year_start').val(date.date.getFullYear() - 1);
                            }

                            if (parseFloat(date.date.getFullYear()) <= parseInt($('.datepicker_year_start').val())) {

                                $('.datepicker_year_start').val(date.date.getFullYear() - 1);
                            }
                        }
                    }
                })
            }



            // Listen for input event on numInput.
            $('#number').onkeydown = function(e) {
                if (!((e.keyCode > 95 && e.keyCode < 106) ||
                        (e.keyCode > 47 && e.keyCode < 58) ||
                        e.keyCode == 8)) {
                    return false;
                }
            }


            // $('.repeater').repeater({
            //     show: function() {
            //         $(this).slideDown();
            //     },
            //     hide: function(remove) {
            //         if (confirm('Etes vous sure de supprimer cet élément ?')) {
            //             $(this).slideUp(remove);
            //         }
            //     }
            // });
        });
    </script>


<?php

}

add_action('wp_footer', 'datepicker_script');

function datepicker_script_admin()
{
    ?>

    <script type='text/javascript'>
        jQuery(document).ready(function($) {
            if ($('.datepicker').length > 0) {
                $('.datepicker').datepicker({
                    language: 'fr-FR',
                    format: 'dd/mm/yyyy',
                    autoHide: true
                });
            }
        });
    </script>


<?php

}

add_action('admin_footer', 'datepicker_script_admin');
