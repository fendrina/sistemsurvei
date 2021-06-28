$(function() {

    $("#newModalForm").validate({
      rules: {
        nama_unit: {
          required: true,
          minlength: 8
        },
        action: "required"
      },
      messages: {
        nama_unit: {
          required: "Please enter some data",
          minlength: "Your data must be at least 8 characters"
        },
        action: "Please provide some data"
      }
    });
  });