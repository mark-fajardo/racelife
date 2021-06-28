var xhr = false;
window.onload = getSession;

function getSession() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = getSessionResult;
        xhr.open('GET', 'action/session.php', true);
        xhr.send(null);
    }
}

function getSessionResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            if (xhr.responseText == 0) {
                $('#log-in-sign-up-form').fadeIn();
            } else {
                $('#username-display').html('Hi ' + xhr.responseText);
                $('#shop-body').fadeIn();
            }
            getItems();
            setTimeout(function () {
                $('#shirts-container').fadeIn();
            }, 700)
        }
    }
}

function loginUser() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = loginResult;
        xhr.open('POST', 'action/login.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('username=' + $('#username-login').val() + '&password=' + $('#password-login').val());
    }
}

function loginResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            $('.error-msg').text(xhr.responseText);
            if (xhr.responseText == 'User logged in') {
                $('.error-msg').text('');
                $('#log-in-sign-up-form').fadeOut();
                $('#shop-body').fadeIn();
                $('#username-login').val('');
                $('#password-login').val('');
                getSession();
            }
        }
    }
}

function registerUser() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = registerResult;
        xhr.open('POST', 'action/register.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('name=' + $('#name-signup').val() + '&username=' + $('#username-signup').val() + '&password=' + $('#password-signup').val());
    }
}

function registerResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            $('.error-msg').text(xhr.responseText);
            if (xhr.responseText == 'User registered') {
                $('.error-msg').text('');
                $('#log-in-sign-up-form').fadeOut();
                $('#shop-body').fadeIn();
                $('#name-signup').val('');
                $('#username-signup').val('');
                $('#password-signup').val('');
                $('#signup-form').slideUp();
                $('#login-form').slideDown();
                getSession();
            }
        }
    }
}

function logoutUser() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = logoutResult;
        xhr.open('GET', 'action/logout.php', true);
        xhr.send(null);
    }
}

function logoutResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            $('#shop-body').fadeOut();
            $('#log-in-sign-up-form').fadeIn();
        }
    }
}

function getItems() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = getItemsResult;
        xhr.open('GET', 'action/items.php', true);
        xhr.send(null);
    }
}

function getItemsResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            $('#items-display').html(xhr.responseText);
        }
    }
}

function openCategory(evt, categoryId) {
    if (categoryId == 'cart-container') {
        getCart();
        // getItems();
    }
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    for (i = 0; i < tabcontent.length; i++) {
        $('#' + tabcontent[i].id).stop().fadeOut();
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
   
    $('#' + categoryId).stop().fadeIn();
    evt.currentTarget.className += ' active';
}

function showDesc(id, itemNo, itemCategory) {
    $('#' + id + '-desc').stop().show();
    getDesc(id, itemNo, itemCategory);
}

function hideDesc(id) {
    $('#' + id + '-desc').stop().fadeOut();
}

function getDesc(id, itemNo, itemCategory) {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = getDescResult(id);
        xhr.open('GET', 'action/description.php?item_no=' + itemNo + '&category=' + itemCategory, true);
        xhr.send(null);
    }
}

function getDescResult(id) {
    return function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                $('#' + id + '-desc').html(xhr.responseText);
            }
        }
    }
}

function addToCart(itemNo, itemCategory) {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = addToCartResult;
        xhr.open('GET', 'action/cart.php?item_no=' + itemNo + '&category=' + itemCategory, true);
        xhr.send(null);
    }
}

function addToCartResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            alert(xhr.responseText);
        }
    }
}

function getCart() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = getCartResult;
        xhr.open('GET', 'action/cart.php?fetch=all', true);
        xhr.send(null);
    }
}

function getCartResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            $('#cart-container').html(xhr.responseText);
        }
    }
}

function checkout() {
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) { }
        }
    }

    if (xhr) {
        xhr.onreadystatechange = checkoutResult;
        xhr.open('GET', 'action/checkout.php', true);
        xhr.send(null);
    }
}

function checkoutResult() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            alert('Successfully checked out');
            location.reload();
        }
    }
}