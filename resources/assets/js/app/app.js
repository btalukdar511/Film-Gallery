
$(document).ready(function () {
    var inputs = document.querySelectorAll('.poster');
    Array.prototype.forEach.call(inputs, function (input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;


        input.addEventListener('change', function (e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();

            console.log(labelVal);

            if (fileName)
                label.querySelector('span').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });

    $(".dropdown-toggle").dropdown();


    $('.multiAddSubmit').on('submit', function (e) {
            e.preventDefault();

            var submitBtn = $(".btn-submit", this);

            var formData = $(this).serialize();

            submitBtn.val("Sending");
            submitBtn.attr("disabled", "disabled");


            var url = $(".multiAddSubmit").prop('action');
            // the script where you handle the form input

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData, // serializes the form's elements.
                success: function (data) {
                    submitBtn.val("Created");
                    submitBtn.css("color", "white");
                    submitBtn.css("background-color", "green");
                    console.log(data);
                },
                error: function (data) {
                    submitBtn.val("Failed");
                    submitBtn.css("color", "white");
                    submitBtn.css("background-color", "red");
                    console.log(data.responseText);
                }
            });
        }
    );


    $('.multiAddSubmitAll').on('submit', function (e) {
        e.preventDefault();

        $(".btn-submit", this).attr("disabled", "disabled");
        $(".btn-submit", this).val("Processing");

        $(".multiAddSubmit").each(function (i, obj) {
            if ($(".select", this).prop('checked')) {
                $(".btn-submit", this).click();
            }
        });
        $(".btn-submit", this).val("Completed");
    });

    //detect change in inputs for all fields

    $('.all-year').on('input', function (e) {
        if ($(this).val().length === 4) {
            var year = $(this).val();

            $(".year").each(function (i, obj) {
                var parent = $(this).parent().parent();
                if (parent.find(".select").prop('checked')) {
                    parent.find(".year").val(year);
                }
            });
        }
    });

    $('.all-audio').on('change', function () {
        var audio = $(this).val();
        $(".audio").each(function (i, obj) {
            var parent = $(this).parent().parent();
            if (parent.find(".select").prop('checked')) {
                parent.find('.audio').val(audio);
            }
        });
    });

    $('.all-category').on('change', function () {
        var cat = $(this).val();
        $(".category").each(function (i, obj) {
            var parent = $(this).parent().parent();
            if (parent.find(".select").prop('checked')) {
                parent.find('.category').val(cat);
            }
        });
    });

    $('.all-select').on('change', function () {
        var select = $(this).prop('checked');

        $('.select').each(function (i, obj) {
            $(this).prop('checked', select);
        });
    });

});

