$(document).ready(function () {
    $("#formFeedback").submit(function (e) {
        e.preventDefault();
        let link = $('meta[name="link-api-save"]').attr("link");
        $.ajax({
            url: link,
            method: "POST",
            data: new FormData(this),
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
        });
    });
});
