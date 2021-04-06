import './libs';
import slick from 'slick-carousel';

require('./template/adminlte');

$(() => {
    $( document ).ready(function() {
        if($('.custom-editor').length){
            $('.custom-editor').summernote({
                placeholder: 'Please Edit Here.',
                tabsize: 2,
                height: $('.custom-editor').attr('data-weight'),
            });
        }
        $('.select2').select2({
            allowClear: true
        });

    });
})
