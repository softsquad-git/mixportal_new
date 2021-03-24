$(document).ready(function() {
    window.axios.defaults.headers.common = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'X-Requested-With': 'XMLHttpRequest'
    };

    $('#subCategory').hide();

    $('#category').change(function (e) {
        const url = $(e.target).data('url');
        const categoryID = $(this).val();
        axios.get(url+`?category_id=${categoryID}`)
            .then((data) => {
                $('#subCategory').show();
                $('#subCategory').find('option').remove().end();
                const result = data.data.data;
                const resultLength = result.length;
                for (let i = 0; i < resultLength; i++) {
                    let newOption = $('<option/>');
                    newOption.text(result[i].name);
                    newOption.attr('value', result[i].id);
                    $('#subCategory').append(newOption);
                }
            }).catch((error) => {
                //
        })
    })
});
