$(document).ready(function () {


    $('.delete-btn').click(function () {
        var res = confirm('Are you sure you want to delete it ?');
        if (!res) {
            return false;
        }
    });
    })
