/**
 * Handles form submission and authentication.
 */
$(document).ready(function () {
  $("form").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      employee_email: $("#email").val(),
      employee_password: $("#pwd").val(),
    };

    $.ajax({
      url: "https://dev-lasne221.users.info.unicaen.fr/bikestores/employees/auth",
      type: "post",
      data: formData,
      success: function (response) {
        if (response.error) {
          alert(response.error);
        } else if (response.success) {
          console.log(response.success);
          //generate a cookie
          var date = new Date();
          date.setTime(date.getTime() + 7 * 24 * 60 * 60 * 1000);
          var expires = "; expires=" + date.toUTCString();
          var employeeInfo = {
            name: response.employeeName,
            email: response.employeeEmail,
            role: response.employeeRole,
            store: response.storeId,
          };
          document.cookie =
            "employeeInfo=" +
            JSON.stringify(employeeInfo) +
            expires +
            "; path=/";

          window.location.href =
            "https://dev-lasne221.users.info.unicaen.fr/Bikestores/";
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      },
    });
  });
});
