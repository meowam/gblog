
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }



})(jQuery);

// NOTICE!!! Initially embedded in our docs this JavaScript
// file contains elements that can help you create reproducible
// use cases in StackBlitz for instance.
// In a real project please adapt this content to your needs.
// ++++++++++++++++++++++++++++++++++++++++++

/*!
 * JavaScript for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2022 The Bootstrap Authors
 * Copyright 2011-2022 Twitter, Inc.
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 * For details, see https://creativecommons.org/licenses/by/3.0/.
 */

/* global bootstrap: false */

(() => {
    'use strict'

    // --------
    // Tooltips
    // --------
    // Instantiate all tooltips in a docs or StackBlitz page
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach(tooltip => {
            new bootstrap.Tooltip(tooltip)
        })

    // --------
    // Popovers
    // --------
    // Instantiate all popovers in a docs or StackBlitz page
    document.querySelectorAll('[data-bs-toggle="popover"]')
        .forEach(popover => {
            new bootstrap.Popover(popover)
        })

    // -------------------------------
    // Toasts
    // -------------------------------
    // Used by 'Placement' example in docs or StackBlitz
    const toastPlacement = document.getElementById('toastPlacement')
    if (toastPlacement) {
        document.getElementById('selectToastPlacement').addEventListener('change', function () {
            if (!toastPlacement.dataset.originalClass) {
                toastPlacement.dataset.originalClass = toastPlacement.className
            }

            toastPlacement.className = `${toastPlacement.dataset.originalClass} ${this.value}`
        })
    }

    // Instantiate all toasts in a docs page only
    document.querySelectorAll('.bd-example .toast')
        .forEach(toastNode => {
            const toast = new bootstrap.Toast(toastNode, {
                autohide: false
            })

            toast.show()
        })

    // Instantiate all toasts in a docs page only
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }

    // -------------------------------
    // Alerts
    // -------------------------------
    // Used in 'Show live toast' example in docs or StackBlitz
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const alertTrigger = document.getElementById('liveAlertBtn')

    const appendAlert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            appendAlert('Nice, you triggered this alert message!', 'success')
        })
    }

    // --------
    // Carousels
    // --------
    // Instantiate all non-autoplaying carousels in a docs or StackBlitz page
    document.querySelectorAll('.carousel:not([data-bs-ride="carousel"])')
        .forEach(carousel => {
            bootstrap.Carousel.getOrCreateInstance(carousel)
        })

    // -------------------------------
    // Checks & Radios
    // -------------------------------
    // Indeterminate checkbox example in docs and StackBlitz
    document.querySelectorAll('.bd-example-indeterminate [type="checkbox"]')
        .forEach(checkbox => {
            if (checkbox.id.includes('Indeterminate')) {
                checkbox.indeterminate = true
            }
        })

    // -------------------------------
    // Links
    // -------------------------------
    // Disable empty links in docs examples only
    document.querySelectorAll('.bd-content [href="#"]')
        .forEach(link => {
            link.addEventListener('click', event => {
                event.preventDefault()
            })
        })

    // -------------------------------
    // Modal
    // -------------------------------
    // Modal 'Varying modal content' example in docs and StackBlitz


    // -------------------------------
    // Offcanvas
    // -------------------------------
    // 'Offcanvas components' example in docs only
    const myOffcanvas = document.querySelectorAll('.bd-example-offcanvas .offcanvas')
    if (myOffcanvas) {
        myOffcanvas.forEach(offcanvas => {
            offcanvas.addEventListener('show.bs.offcanvas', event => {
                event.preventDefault()
            }, false)
        })
    }
})()

// document.querySelector('.col').addEventListener('click', function() {
//     window.location.href = this.getAttribute('data-href');
// });
// 

function setFigureBackgroundColors() {
    const colors = ['#839CC2', '#E0BFBF', '#CABFE0', '#BFE0C0', '#E7DAAD'];
    const figureList = document.querySelectorAll('.forum-figure');
    let colorIndex = 0;

    for (let i = 0; i < figureList.length; i++) {
        figureList[i].style.backgroundColor = colors[colorIndex];
        colorIndex = (colorIndex + 1) % colors.length;
    }
}

$(document).ready(function () {
    setFigureBackgroundColors();
    $('#register-form').submit(function (event) {
        event.preventDefault();
        var email = $('input[name="emailRegister"]').val().trim();
        var username = $('input[name="usernameRegister"]').val().trim();
        var password = $('input[name="passwordRegister"]').val().trim();
        if (!email || !username || !password) {
            alert('Будь ласка, заповніть всі поля');
            return;
        } if (!email.includes('@')) {
            alert('Будь ласка, введіть коректний email');
            return;
        }

        $.ajax({
            url: '/configs/register.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                response = JSON.parse(response);
                if (response.error) {
                    alert(response.error);
                }
                if (response.username) {
                    $('#exampleModal2').modal('hide');
                    $('#exampleModal').modal('show');
                    alert('Користувача зареєстровано!');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Помилка при відправці форми: ' + textStatus + ', ' + errorThrown);
            }
        });
    });

    $('#login-form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: '/configs/login.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                response = JSON.parse(response);
                if (response.success) {
                    $('#exampleModal').modal('hide');
                    location.reload();
                } else {
                    alert("Невірні дані для входу");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Помилка при відправці форми: ' + textStatus + ', ' + errorThrown);
            }
        });
    });

    $("#user-profile-saved").click(function () {
        $("#form-favorites").addClass('vis-n');
        $("#form-settings").addClass('vis-n');
        $("#form-saved").removeClass('vis-n');
    });
    $("#user-profile-favorites").click(function () {
        $("#form-saved").addClass('vis-n');
        $("#form-settings").addClass('vis-n');
        $("#form-favorites").removeClass('vis-n');
    });

    $("#user-profile-settings").click(function () {
        $("#form-settings").removeClass('vis-n');
        $("#form-saved").addClass('vis-n');
        $("#form-favorites").addClass('vis-n');
    });

    $('#profile-form').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '/scripts/user_settings.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                response = JSON.parse(response);
                if (response.success) {
                    if (response.changePassword) {
                        alert('Пароль успішно змінено! Зміни акаунту збережені.');
                        $('#password_old').val("");
                        $('#password_new').val("");
                        $('#file-avatar').val("");
                    } else {
                        alert('Зміни акаунту успішно збережені!');
                    }

                    if (response.username) {
                        $('#usernameSettings').text(response.username);
                        $('#user_name').text(response.username);
                    }
                    if (response.imageName) {
                        $('#ImageUser').attr('src', '/assets/img/avatar/' + response.imageName);
                        $('#avatar-header').attr('src', '/assets/img/avatar/' + response.imageName);

                    }

                } else {
                    if (!response.changePassword) {
                        alert('Паролі не збігаються!');
                    } else {
                        alert('Виникла помилка!');
                    }
                    console.log(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert('An error occurred while saving profile!');
                console.log(error);
            }
        });
    });


    $(".btn-group_liked").click(function () {
        // Отримання id продукту
        var news_id = $(this).data("newsid");
        var user_auth = $(this).data("userauth");
        if (!user_auth) {
            alert("Увійдіть в акаунт!");
        } else {
            $.ajax({
                url: "/scripts/handler_favorites.php",
                type: "POST",
                data: { news_id: news_id },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == "liked") {
                        $(".btn-group_liked[data-newsid='" + news_id + "'] i").css("background-image", "url('/assets/img/icon/heart_liked.svg')");

                    } else {
                        $(".btn-group_liked[data-newsid='" + news_id + "'] i").css("background-image", "url('/assets/img/icon/heart.svg')");
                    }
                },

                error: function () {
                }
            });
        }
    });
    $(".create-tierlist").click(function (event) {
        event.preventDefault();
        window.location.href = "/partials/header_pages/tier-list.php";
    });
    $(".create-post").click(function (event) {
        event.preventDefault();
        window.location.href = "/partials/posts/add-post.php";
    });
    var counter = 2;

    $("#add-category").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "/partials/posts/get_categories.php",
            dataType: "html",
            success: function (data) {
                $.ajax({
                    url: "/partials/posts/get_max_categories.php",
                    dataType: "json",
                    success: function (maxCategories) {
                        if ($("#categories > .mb-3").length < maxCategories) {
                            var newCategoryDiv = $('<div id="categories' + counter + '" class="mb-3">' +
                                '<label class="form-label">Категорія ' + counter + '</label>' +
                                '<select id="disabledSelect" class="form-select" name="categories[]">' +
                                '<option>Не вибрано</option>' +
                                data +
                                '</select>' +
                                '</div>');
                            newCategoryDiv.appendTo("#categories");
                            counter++;
                        } else {
                            alert("Максимальна кількість категорій вже додана!");
                        }
                    }
                });
            }
        });
    });
    $("#delete-category").click(function (event) {
        event.preventDefault();
        var categories = $("#categories > .mb-3");
        if (categories.length > 1) {
            var lastCategory = categories.last();
            if (lastCategory.attr("id") !== "categories1") {
                lastCategory.remove();
                counter--;
            } else {
                alert("Неможливо видалити першу категорію!");
            }
        } else {
            alert("Неможливо видалити всі категорії!");
        }
    });

   

    $('#formCommentDisscution').on('submit', function (e) {
        e.preventDefault();
        let form_data = new FormData($('#formCommentDisscution')[0]);
        var countElem = $('#countCommentsDisscusion');
        var count = parseInt(countElem.text().replace(/[^\d]/g, ''));
        $.ajax({
            url: "/scripts/add_commentDisscusion.php",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == "error") {
                    alert("Щоб залишити коментар, увійдіть будь ласка, в акаунт");
                } else {
                    $('#commentListDiscussion').prepend(data);
                    $('#formCommentDisscution')[0].reset();
                    count++;
                    countElem.text('(' + count + ')');
                }

            },

        })

    });

    $("#search_discussions").keyup(function () {
        var query = $("#search_discussions").val();

        if (query.length > 1) {
            $('#result_search_discussions').show();
            $('#list_discussions').hide();
            $('#pagination_discussions').hide();
            $.ajax(
                {
                    url: '/partials/forum/search.php',
                    method: 'POST',
                    data: {
                        search: 1,
                        q: query
                    },
                    success: function (data) {
                        $("#result_search_discussions").html(data);
                        setFigureBackgroundColors();
                        $('#search_discussions').on('search', function () {
                            $('#result_search_discussions').hide();
                            $('#list_discussions').show();
                            $('#pagination_discussions').show();
                        });
                    },
                    dataType: 'text'
                }
            );
        }

    });

    $(".btn-group_saved").click(function () {
        // Отримання id продукту
        var post_id = $(this).data("postid");
        var user_auth = $(this).data("userauth");
        if (!user_auth) {
            alert("Увійдіть в акаунт!");
        } else {
            $.ajax({
                url: "/scripts/handler_saved.php",
                type: "POST",
                data: { post_id: post_id },
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == "liked") {
                        $(".btn-group_saved[data-postid='" + post_id + "'] i").css("background-image", "url('/assets/img/icon/bookmark_saved.svg')");
                        $(".saved_post").text("Збережено");
                    } else {
                        $(".btn-group_saved[data-postid='" + post_id + "'] i").css("background-image", "url('/assets/img/icon/bookmark-outline.svg')");
                        $(".saved_post").text("Зберегти");
                    }
                },

                error: function () {
                }
            });
        }
    });


    $('#formCommentPost').on('submit', function (e) {
        e.preventDefault();
        let form_data = new FormData($('#formCommentPost')[0]);
        var countElem = $('#countCommentsPost');
        var countElem1 = $('#countCOmmentPost');
        var count = parseInt(countElem.text().replace(/[^\d]/g, ''));
        $.ajax({
            url: "/scripts/add_commentPost.php",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == "error") {
                    alert("Щоб залишити коментар, увійдіть будь ласка, в акаунт");
                } else {
                    $('#commentListPost').prepend(data);
                    $('#formCommentPost')[0].reset();
                    count++;
                    countElem1.text(count);
                    countElem.text('(' + count + ')');
                }
            },
        })
    });

    // $('#AddPost').submit(function(event) {
    //     event.preventDefault();
    //     alert(editor.getData());
    //     // var editorData = CKEDITOR.instances.editor.getData();
    //     // alert(1);
    //     var formData = new FormData(this);
    //     formData.append('editorData', editorData);
    //     alert(formData);
        // $.ajax({
        //     url: '/scripts/handler_posts.php',
        //     type: 'POST',
        //     data: formData,
        //     processData: false,
        //     contentType: false,
        //     success: function(response) {
        //         console.log(response);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(xhr.responseText);
        //     }
        // });
    // });

});




// $('#form_discussions').on('submit', function (e) {
//     e.preventDefault();
//     let form_data = new FormData($('#form_discussions')[0]);
//     $.ajax({
//         url: "/scripts/add_Disscusion.php",
//         type: "POST",
//         data: form_data,
//         processData: false,
//         contentType: false,
//         success: function (data) {
//             if (data == "error") {
//                 alert("Щоб додати обговорення, увійдіть будь ласка, в акаунт");
//             } else {
//                 $('#list_discussions').prepend(data);
//                 $('#form_discussions')[0].reset();
//             }
//         },
//     })
// });


