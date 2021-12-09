(function() {
    'use strict';

    $(document).on({
        // Show progressBar on ajax start
        ajaxStart: function() { progressBar.progressBarStart(); },
        // Hide progressBar on ajax stop
        ajaxStop: function() { progressBar.progressBarStop(); },
    });


    // Check new avatar image
    $(document).ready(function() {
        $("#avatar").change(function() {
            var fileExtension = ['jpeg', 'jpg', 'png']; // Allowed types
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                swal("Opps !", "This file type not allowed", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                }).then(function() {
                    $('#avatar').val(''); // Reset avatar if there is an error
                });
            } else {
                var avatar = true,
                    readAvatarURL;
                if (avatar) {
                    readAvatarURL = function(input_avatar) {
                        if (input_avatar.files && input_avatar.files[0]) {
                            var reader = new FileReader(); // Read new file
                            reader.onload = function(e) {
                                $('#preview_avatar').attr('src', e.target.result); // preview new avatar 
                            }
                            reader.readAsDataURL(input_avatar.files[0]);
                        }
                    }
                }
                readAvatarURL(this);
            }
        });

        // Ajax setup headers 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Csrf token
            }
        });

        // Ajax Update User info
        $("body").on("click", "#saveInfoBtn", function(e) {
            e.preventDefault();
            var formData = new FormData($(this).parents('form')[0]); // Form data
            $(".btninfo").prop("disabled", true); // Disable button when click
            $(".spinner-border-info").removeClass('d-none'); // show spinner on button
            $.ajax({
                url: BASE_URL + '/user/settings/update/info',
                type: "post",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".btninfo").prop("disabled", false); // active button when success
                    $(".spinner-border-info").addClass('d-none'); // hide spinner when success
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg").css('display', 'none');
                        swal("Success!", data.success, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            location.reload(); // Reald when click ok
                        });
                    } else {
                        printErrorMsg(data.error); // Print error messages 
                    }
                }
            });
        });

        // Ajax update user password
        $("body").on("click", "#savePassBtn", function(e) {
            e.preventDefault();
            $(".btnpass").prop("disabled", true); // Disable button when click
            $(".spinner-border-pass").removeClass('d-none'); // show spinner on button
            $.ajax({
                url: BASE_URL + '/user/settings/update/password',
                type: "post",
                data: {
                    'current-password': $('#currentpassword').val(),
                    'new-password': $('#newpassword').val(),
                    'new-password_confirmation': $('#newpasswordconfirm').val(),
                },
                dataType: 'json',
                success: function(data) {
                    $(".btnpass").prop("disabled", false); // active button when success
                    $(".spinner-border-pass").addClass('d-none'); // hide spinner when success
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg-sec").css('display', 'none');
                        $("#passwordForm")[0].reset();
                        swal("Success!", data.success, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        })
                    } else {
                        printErrorMsgSec(data.error);
                    }
                }
            });
        });

        // Print errors 
        function printErrorMsg(msg) {
            $(".print-error-msg").find("span").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("span").append('<li>' + value + '</li>');
            });
        }

        // Print errors 
        function printErrorMsgSec(msg) {
            $(".print-error-msg-sec").find("span").html('');
            $(".print-error-msg-sec").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg-sec").find("span").append('<li>' + value + '</li>');
            });
        }


        // Delete video from videos
        $("body").on("click", "#deleteVideo", function(e) {
            e.preventDefault();
            swal({
                icon: "info",
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-primary'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-secondary'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    var id = $(this).data("id"); // video id
                    $.ajax({
                        url: BASE_URL + "/user/videos/delete/" + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                $('.video' + id).remove(); // Remove video from videos
                                if (response.avdata === 0) {
                                    $('.empty-studio').removeClass('d-none'); // Show empty message if there is no data
                                }
                                swal("Success!", response.success, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    },
                                }).then(function() {
                                    location.reload(); // Reald when click ok
                                });
                            } else {
                                swal("Opps !", response.error, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-danger'
                                        }
                                    },
                                })
                            }
                        },
                    });
                } else {
                    swal.close();
                }
            });
        });

    });
})(jQuery);