(function($) {
    'use strict';

    // Show datatable with order by desc
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            order: [
                [0, "desc"]
            ]
        });
    });

    // Remove spaces from input
    $(".remove-spaces").keyup(function() {
        $(this).val($(this).val().replace(/\s/g, ""));
    });

    // top progressBar
    $(document).on({
        // Show progressBar on ajax start
        ajaxStart: function() {
            progressBar.progressBarStart();
        },
        // Hide progressBar on ajax stop
        ajaxStop: function() {
            progressBar.progressBarStop();
        },
    });

    $(document).ready(function() {

        // Ajax setup csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //csrf token
            }
        });

        // Delete upload  video
        $("body").on("click", "#deleteUpload", function(e) {
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
                        url: BASE_URL + "/admin/uploads/delete/" + id,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                $('.video-table' + id).remove(); // remove video
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

        // Add new admin
        $("body").on("click", "#addAdmin", function(e) {
            e.preventDefault();
            $(".btnadd").prop("disabled", true); // disable add button when click
            $.ajax({
                url: BASE_URL + '/admin/user/add',
                type: "post",
                data: {
                    'name': $('#name').val(), // admin name
                    'email': $('#email').val(), // admin email
                    'password': $('#password').val(), // admin password
                    'password_confirmation': $('#confirm-password').val(), // confirm password
                },
                dataType: 'json',
                success: function(data) {
                    $(".btnadd").prop("disabled", false); // active add button when on success
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg").css('display', 'none'); // hide errors
                        $('#modal-simple').modal('hide'); // hide modal
                        $("#addAdminForm")[0].reset(); // reset form
                        swal("Success!", data.success, {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            location.reload(); // reload when click ok
                        });
                    } else {
                        printErrorMsg(data.error); // print error messages
                    }
                }
            });
        });

        // Ban user when click button
        $("body").on("click", "#banuser", function(e) {
            e.preventDefault();
            swal({
                icon: "info",
                title: 'Are you sure?',
                text: "Do you want ban this user",
                buttons: {
                    confirm: {
                        text: 'Yes, Ban it',
                        className: 'btn btn-primary'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-secondary'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    var id = $(this).data("id"); // user id
                    $.ajax({
                        url: BASE_URL + "/admin/user/ban/" + id,
                        type: 'get',
                        dataType: "JSON",
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                $('.banuser' + id).addClass('d-none'); // hide ban button
                                $('.activeuser' + id).removeClass('d-none'); // show unban button
                                $('.badgeban' + id).removeClass('d-none'); // show banned badge
                                $('.badgeactive' + id).addClass('d-none'); // hide active badge
                                swal("Success!", response.success, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    },
                                })
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

        // Unban user and active it again
        $("body").on("click", "#activeuser", function(e) {
            e.preventDefault();
            swal({
                icon: "info",
                title: 'Are you sure?',
                text: "Do you want unban this user",
                buttons: {
                    confirm: {
                        text: 'Yes, Unban',
                        className: 'btn btn-primary'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-secondary'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    var id = $(this).data("id"); // user id
                    $.ajax({
                        url: BASE_URL + "/admin/user/unban/" + id,
                        type: 'get',
                        dataType: "JSON",
                        data: {
                            "id": id
                        },
                        success: function(response) {
                            if ($.isEmptyObject(response.error)) {
                                $('.banuser' + id).removeClass('d-none'); // show ban button
                                $('.activeuser' + id).addClass('d-none'); // hide unban button
                                $('.badgeban' + id).addClass('d-none'); // hide banned badge
                                $('.badgeactive' + id).removeClass('d-none'); // show active badge
                                swal("Success!", response.success, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    },
                                })
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

    // Delete messages
    $("body").on("click", "#deleteMsg", function(e) {
        e.preventDefault();
        swal({
            icon: "info",
            title: 'Are you sure?',
            text: "Do you want delete this message",
            buttons: {
                confirm: {
                    text: 'Yes, delete it',
                    className: 'btn btn-primary'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-secondary'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                var id = $(this).data("id"); // user id
                $.ajax({
                    url: BASE_URL + "/admin/message/delete/" + id,
                    type: 'delete',
                    dataType: "JSON",
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        if ($.isEmptyObject(response.error)) {
                            $('.deletemessage' + id).remove();
                            swal("Success!", response.success, {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                },
                            }).then(function() {
                                location.reload(); // reload when click ok
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

    // Update website information
    $("body").on("click", "#saveInfoBtn", function(e) {
        e.preventDefault();
        $(".infoBtn").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/settings/info/update',
            type: "post",
            data: {
                'site_name': $('#site_name').val(), // Site name
                'storage': $('#storage').val(), // storage
                'site_analytics': $('#site_analytics').val(), // Google analytics
                'home_heading': $('#home_heading').val(), // Home page heading
                'home_descritption': $('#home_descritption').val(), // Home descritption
                'max_filesize': $('#max_filesize').val(), // Max fle size
                'onetime_uploads': $('#onetime_uploads').val(), // One time uploads
            },
            dataType: 'json',
            success: function(data) {
                $(".infoBtn").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        location.reload(); // reload when click ok
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });


    // Favicon check and preview
    $("#favicon").change(function() {
        var fileExtension = ['ico', 'png', 'jpg', 'jpeg']; // Allowed types
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            swal("Error!", "Only ico, png, jpg, jpeg are allowed", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            }).then(function() {
                $('#favicon').val(''); // Reset input
            });
        } else {
            var favicon = true,
                readFaviconURL;
            if (favicon) {
                readFaviconURL = function(input_favicon) {
                    if (input_favicon.files && input_favicon.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.favbox').removeClass('d-none'); // show box image
                            $('#preview_favicon').attr('src', e.target.result); // Preview image
                        }
                        reader.readAsDataURL(input_favicon.files[0]);
                    }
                }
            }
            readFaviconURL(this);
        }
    });

    // Logo check and preview
    $("#logo").change(function() {
        var fileExtension = ['png', 'jpg', 'jpeg', 'svg'] // Allowed types
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            swal("Error!", "Only png, jpg, jpeg are allowed", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            }).then(function() {
                $('#logo').val(''); // Reset input
            });
        } else {
            var logo = true,
                readLogoURL;
            if (logo) {
                readLogoURL = function(input_logo) {
                    if (input_logo.files && input_logo.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.logobox').removeClass('d-none'); // show box image
                            $('#preview_logo').attr('src', e.target.result); // Preview image
                        }
                        reader.readAsDataURL(input_logo.files[0]);
                    }
                }
            }

            readLogoURL(this);
        }
    });

    // Update logo and favicon
    $("body").on("click", "#saveLogoFavBtn", function(e) {
        e.preventDefault(); // this prevents the form from submitting
        $(".LogoFavBtn").prop("disabled", true); // disable button when click
        var formData = new FormData($(this).parents('form')[0]);
        $.ajax({
            url: BASE_URL + '/admin/settings/logofav/update',
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $(".LogoFavBtn").prop("disabled", false); // disable button when click
                if ($.isEmptyObject(data.error)) {
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    });


    // Update api 
    $("body").on("click", "#saveApiBtn", function(e) {
        e.preventDefault();
        $(".apiBtn").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/settings/api/update',
            type: "post",
            data: {
                'google_key': $('#google_key').val(), // Google SITEKEY
                'google_secret': $('#google_secret').val(), // Google SECRET
                'facebook_clientid': $('#facebook_clientid').val(), // Facebook CLIENT ID
                'facebook_clientsecret': $('#facebook_clientsecret').val(), // Facebook CLIENT SECRET
                'facebook_reurl': $('#facebook_reurl').val(), // Facebook redirect url
                'twitter_clientid': $('#twitter_clientid').val(), // Twitter CLIENT ID
                'twitter_clientsecret': $('#twitter_clientsecret').val(), // Tiwtter CLIENT SECRET
                'twitter_reurl': $('#twitter_reurl').val(), // Twitter redirect url
            },
            dataType: 'json',
            success: function(data) {
                $(".apiBtn").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Update Seo
    $("body").on("click", "#saveSeoBtn", function(e) {
        e.preventDefault();
        $(".seoBtn").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/settings/seo/update',
            type: "post",
            data: {
                'seo_title': $('#seo_title').val(), // Home page title
                'seo_description': $('#seo_description').val(), // Description
                'seo_keywords': $('#seo_keywords').val(), // Keywords
            },
            dataType: 'json',
            success: function(data) {
                $(".seoBtn").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Update Steps
    $("body").on("click", "#saveStepsBtn", function(e) {
        e.preventDefault();
        $(".saveStepsBtn").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/settings/steps/update',
            type: "post",
            data: {
                'steps_title': $('#steps_title').val(), // title
                'steps_description': $('#steps_description').val(), // Description
                'step1_title': $('#step1_title').val(), // step 1
                'step2_title': $('#step2_title').val(), // step 1
                'step3_title': $('#step3_title').val(), // step 1
            },
            dataType: 'json',
            success: function(data) {
                $(".saveStepsBtn").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Check new avatar image
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
                };
            }
            readAvatarURL(this);
        }
    });

    // Ajax Update admin info
    $("body").on("click", "#saveAdminInfoBtn", function(e) {
        e.preventDefault();
        var formData = new FormData($(this).parents('form')[0]); // Form data
        $(".btninfo").prop("disabled", true); // Disable button when click
        $.ajax({
            url: BASE_URL + '/admin/profile/update/info',
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $(".btninfo").prop("disabled", false); // active button when success
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

    // Ajax update admin password
    $("body").on("click", "#saveAdminPassBtn", function(e) {
        e.preventDefault();
        $(".btnpass").prop("disabled", true); // Disable button when click
        $.ajax({
            url: BASE_URL + '/admin/profile/update/password',
            type: "post",
            data: {
                'current-password': $('#currentpassword').val(),
                'new-password': $('#newpassword').val(),
                'new-password_confirmation': $('#newpasswordconfirm').val(),
            },
            dataType: 'json',
            success: function(data) {
                $(".btnpass").prop("disabled", false); // active button when success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none');
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
                    printErrorMsg(data.error);
                }
            }
        });
    });

    // Add new page 
    $("body").on("click", "#addPageBtn", function(e) {
        e.preventDefault();
        $(".addPageBtn").prop("disabled", true); // disable add button when click
        $.ajax({
            url: BASE_URL + '/admin/pages/add/store',
            type: "post",
            data: {
                'title': $('#title').val(), // Page title
                'slug': $('#slug').val(), // Page slug
                'content': $('#content').val(), // Page content
            },
            dataType: 'json',
            success: function(data) {
                $(".addPageBtn").prop("disabled", false); // active add button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    $("#addPageForm")[0].reset(); // reset form
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        window.location.replace(BASE_URL + "/admin/pages"); // back to pages when page added
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Edit page 
    $("body").on("click", "#editPageBtn", function(e) {
        e.preventDefault();
        $(".editPageBtn").prop("disabled", true); // disable add button when click
        $.ajax({
            url: BASE_URL + '/admin/pages/edit/store',
            type: "post",
            data: {
                'page_id': $('#page_id').val(), // Page id
                'title': $('#title').val(), // Page title
                'slug': $('#slug').val(), // Page slug
                'content': $('#content').val(), // Page content
            },
            dataType: 'json',
            success: function(data) {
                $(".editPageBtn").prop("disabled", false); // active add button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    $("#editPageForm")[0].reset(); // reset form
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Delete page
    $("body").on("click", "#deletePage", function(e) {
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
                var id = $(this).data("id"); // page id
                $.ajax({
                    url: BASE_URL + "/admin/pages/delete/" + id,
                    type: 'delete',
                    dataType: "JSON",
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        if ($.isEmptyObject(response.error)) {
                            $('.page-table' + id).remove(); // remove page 
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

    // Update amazon S3
    $("body").on("click", "#amazonSaveBtn", function(e) {
        e.preventDefault();
        $(".s3Btn").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/amazon/update/store',
            type: "post",
            data: {
                'status': $('#status').val(), // status
                'aws_access_key_id': $('#aws_access_key_id').val(), // key id
                'aws_secret_access_key': $('#aws_secret_access_key').val(), // access key
                'aws_default_region': $('#aws_default_region').val(), // default region
                'aws_bucket': $('#aws_bucket').val(), // bucket name
                'aws_url': $('#aws_url').val(), // url
            },
            dataType: 'json',
            success: function(data) {
                $(".s3Btn").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        location.reload(); // reload when click ok
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Update wasabi S3
    $("body").on("click", "#wasabiSaveBtn", function(e) {
        e.preventDefault();
        $(".wasabis3Btn").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/wasabi/update/store',
            type: "post",
            data: {
                'status': $('#status').val(), // status
                'wasabi_access_key_id': $('#wasabi_access_key_id').val(), // key id
                'wasabi_secret_access_key': $('#wasabi_secret_access_key').val(), // access key
                'wasabi_default_region': $('#wasabi_default_region').val(), // default region
                'wasabi_bucket': $('#wasabi_bucket').val(), // bucket name
                'wasabi_root': $('#wasabi_root').val(), // root
            },
            dataType: 'json',
            success: function(data) {
                $(".wasabis3Btn").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        location.reload(); // reload when click ok
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Update ads
    $("body").on("click", "#saveAdsBtn", function(e) {
        e.preventDefault();
        $(".btnAds").prop("disabled", true); // disable button when click
        $.ajax({
            url: BASE_URL + '/admin/ads/update/store',
            type: "post",
            data: {
                'home_ads_top': $('#home_ads_top').val(), // home top ads
                'home_ads_bottom': $('#home_ads_bottom').val(), // home bottom ads
                'mobile_ads': $('#mobile_ads').val(), // Mobile ads
                'user_account_ads': $('#user_account_ads').val(), // user account ads
            },
            dataType: 'json',
            success: function(data) {
                $(".btnAds").prop("disabled", false); // active button when on success
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg").css('display', 'none'); // hide errors
                    swal("Success!", data.success, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function() {
                        location.reload(); // reload when click ok
                    });
                } else {
                    printErrorMsg(data.error); // print error messages
                }
            }
        });
    });

    // Print error messages
    function printErrorMsg(msg) {
        $(".print-error-msg").find("span").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("span").append('<li>' + value + '</li>');
        });
    }

})(jQuery);