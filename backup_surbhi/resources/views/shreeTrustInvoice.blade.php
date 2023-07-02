<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
  <title>Shree Trust Foundation | Invoice Generator</title>
</head>
<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{  url('') }}/home">Home</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{  url('') }}/addAdmin">Add Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{  url('') }}/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>

  <center>
  <img class="" src="{{asset('assets/header-1.jpg')}}" alt=""  width="1300" height="239"/>
  </center>
  <div class="container pb-5">
    <h1 class="text-center mt-5">Invoice Generator</h1>
    <form id="billForm" class="mt-5">
    <div class="form-group">
        <label for="date">Date <span class="text-danger">*</span> :</label>
        <input type="text" class="form-control" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="name">Name <span class="text-danger">*</span> :</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="address">Address <span class="text-danger">*</span> :</label>
        <input type="text" class="form-control" id="address" name="address" required>
      </div>
      <div class="form-group">
        <label for="totalAmount">Total Amount <span class="text-danger">*</span> :</label>
        <input type="number" class="form-control" id="totalAmount" name="totalAmount" required>
      </div>
      <div class="form-group">
        <label for="split">Split Amount <span class="text-danger">*</span> :</label>
        <input type="number" class="form-control" id="split" name="split" required>
      </div>
    <button type="submit" class="btn btn-primary">Generate Invoice</button>
    </form>
  </div>
  <div class="container dyn_container"></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    var totalAmountInput = document.getElementById('totalAmount');
    var splitAmountInput = document.getElementById('split');
    $('input[type="number"]').on('keydown', function(event) {
      if (event.key === '-' || event.key === 'e') {
        event.preventDefault();
      }
    });
    $(function() {
      $("#date").datepicker({
        dateFormat: "dd MM yy",
        onSelect: function(dateText) {
          var selectedDate = $.datepicker.parseDate("dd MM yy", dateText);
          var formattedDate = $.datepicker.formatDate("dd MM yy", selectedDate);
          $(this).val(formattedDate);
        }
      });
    });
    $(document).ready(function() {
      var formCounter = 0;

      $('#billForm').submit(function(e) {
        e.preventDefault();

        var date = $('#date').val();
        var name = $('#name').val();
        var address = $('#address').val();
        var totalAmount = parseInt($('#totalAmount').val());
        var splitAmount = parseInt($('#split').val());

        var numberOfForms = Math.floor(totalAmount / splitAmount);
        var remainder = totalAmount % splitAmount;
        $('.dyn_container').empty();
        var formDictionary = {};
        var formHtml = '';
        
        for (var i = 0; i < numberOfForms; i++) {
          var formId = 'form_' + formCounter++;

          var formData = {
            date: date,
            amountReceived: splitAmount,
            panCardNumber: '',
            paymentMode: '',
            chequeNumber: '',
            chequeDate: '',
            chequedrawnDate: '',
            buildingFund: '',
            youthActivities: '',
            culturalPrograms: '',
            socialAwareness: '',
            medicalAid: '',
            amountInWords:'',
            name:name
          };
          formDictionary[formId] = formData;

          formHtml += `
          <h3 class="text-center mt-5">Invoice #{{sprintf('%02d', $bill_no+1)}}.${i+1}</h3>
            <form id="${formId}" class="mt-5">
            <div class="form-group">
                  <label for="detailBillName">Name:</label>
                  <input type="text" class="form-control name" id="detailBillName${formId}" value="${name}" name="detailBillName">
              </div>
              <div class="form-group">
                <label>Date:</label>
                <input type="text" class="form-control" value="${date}" readonly>
              </div>
              <div class="form-group">
                <label>Amount Received:</label>
                <input type="text" class="form-control amount-received" value="${splitAmount}" name="amountReceived" readonly>
              </div>
              <div class="form-group">
                <label for="amountInWords">Amount In Words:</label>
                <input type="text" class="form-control amountInWords" id="amountInWords${formId}" name="amountInWords">
              </div>`;
              if(splitAmount > 2000){
                formHtml +=`<label for="panCardNumber">Pan Card Number<span class="text-danger">*:</span></label>
                  <input type="text" class="form-control panCardNumber" id="panCardNumber${formId}" name="panCardNumber" required>
                  <span class="text-danger error-messagePan"></span>
                </div>`;
              }
              formHtml +=`
              <div class="form-group">
                <label>Payment Mode<span class="text-danger">*</span>:</label>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="paymentMode${formId}" id="cheque${formId} chequeOPT" value="cheque" required>
                  <label class="form-check-label" for="cheque${formId}">Cheque</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="paymentMode${formId}" id="cash${formId} cashOPT" value="cash" checked required>
                  <label class="form-check-label" for="cash${formId}">Cash</label>
                </div>
              </div>
              <div class="form-group cheque-fields" style="display: none;">
                <label>Cheque Number<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control cheque-number" name="chequeNumber${formId}" id="chequeNumber${formId}" required>
              </div>
              <div class="form-group cheque-fields" style="display: none;">
                <label>Date<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control cheque-date" name="chequeDate${formId}" id="chequeDate${formId}" required>
              </div>
              <div class="form-group cheque-fields" style="display: none;">
                <label>Drawn Date<span class="text-danger">*</span>:</label>
                <input type="text" class="form-control drawn-date" name="chequedrawnDate${formId}" id="chequedrawnDate${formId}" required>
              </div>
              <div class="form-group">
                <label>Building Fund:</label>
                <input type="number" value="0" class="form-control building-fund" name="buildingFund${formId}" id="buildingFund${formId}">
              </div>
              <div class="form-group">
                <label>Youth Activities:</label>
                <input type="number" value="0" class="form-control youth-activities" name="youthActivities${formId}" id="youthActivities${formId}">
              </div>
              <div class="form-group">
                <label>Cultural Programs:</label>
                <input type="number" value="0" class="form-control cultural-programs" name="culturalPrograms${formId}" id="culturalPrograms${formId}">
              </div>
              <div class="form-group">
                <label>Social Awareness:</label>
                <input type="number" value="0" class="form-control social-awareness" name="socialAwareness${formId}" id="socialAwareness${formId}">
              </div>
              <div class="form-group">
                <label>Medical Aid:</label>
                <input type="number" value="0" class="form-control medical-aid" name="medicalAid${formId}" id="medicalAid${formId}">
              </div>
            </form>
          `;
          $('.error-messagePan').hide();
        }
        if (remainder > 0) {
          var formId = 'form_' + formCounter++;
          var formData = {
            date: date,
            amountReceived: remainder,
            panCardNumber: '',
            paymentMode: '',
            chequeNumber: '',
            chequeDate: '',
            chequedrawnDate: '',
            buildingFund: '',
            youthActivities: '',
            culturalPrograms: '',
            socialAwareness: '',
            medicalAid: '',
            amountInWords:'',
            name:name
          };
          formDictionary[formId] = formData;

          formHtml += `
          <h3 class="text-center mt-5">Invoice #{{sprintf('%02d', $bill_no+1)}}.${i+1}</h3>
             <form id="${formId}" class="mt-5">
              <div class="form-group">
                  <label for="detailBillName">Name:</label>
                  <input type="text" class="form-control name" id="detailBillName${formId}" value="${name}" name="detailBillName">
              </div>
              <div class="form-group">
                <label>Date:</label>
                <input type="text" class="form-control" value="${date}" readonly>
              </div>
              <div class="form-group">
                <label>Amount Received:</label>
                <input type="text" class="form-control amount-received" value="${remainder}" name="amountReceived" readonly>
              </div>
              <div class="form-group">
                <label for="amountInWords">Amount In Words:</label>
                <input type="text" class="form-control" id="amountInWords${formId}" name="amountInWords">
                </div>`;
              if(splitAmount > 2000){
                formHtml +=`<div class="form-group">
                  <label for="panCardNumber">Pan Card Number<span class="text-danger">*:</span></label>
                  <input type="text" class="form-control panCardNumber" id="panCardNumber${formId}" name="panCardNumber" required>
                  <span class="text-danger error-messagePan"></span>
                </div>
                `;
              }
              formHtml +=`
              <div class="form-group">
                 <label>Payment Mode<span class="text-danger">*:</label>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="paymentMode${formId}" id="cheque${formId} chequeOPT" value="cheque" required>
                  <label class="form-check-label" for="cheque${formId}">Cheque</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="paymentMode${formId}" id="cash${formId} cashOPT" value="cash" checked required>
                  <label class="form-check-label" for="cash${formId}">Cash</label>
                </div>
              </div>
              <div class="form-group cheque-fields" style="display: none;">
                <label>Cheque Number<span class="text-danger">*:</label>
                <input type="text" class="form-control cheque-number" name="chequeNumber${formId}" id="chequeNumber${formId}" required>
              </div>
              <div class="form-group cheque-fields" style="display: none;">
                <label>Date<span class="text-danger">*:</label>
                <input type="text" class="form-control cheque-date" name="chequeDate${formId}" id="chequeDate${formId}" required>
              </div>
              <div class="form-group cheque-fields" style="display: none;">
                <label>Drawn Date<span class="text-danger">*:</label>
                <input type="text" class="form-control drawn-date" name="chequedrawnDate${formId}" id="chequedrawnDate${formId}" required>
              </div>
              <div class="form-group">
                <label>Building Fund:</label>
                <input type="number" value="0" class="form-control building-fund" name="buildingFund${formId}" id="buildingFund${formId}">
              </div>
              <div class="form-group">
                <label>Youth Activities:</label>
                <input type="number" value="0" class="form-control youth-activities" name="youthActivities${formId}" id="youthActivities${formId}">
              </div>
              <div class="form-group">
                <label>Cultural Programs:</label>
                <input type="number" value="0" class="form-control cultural-programs" name="culturalPrograms${formId}" id="culturalPrograms${formId}">
              </div>
              <div class="form-group">
                <label>Social Awareness:</label>
                <input type="number" value="0" class="form-control social-awareness" name="socialAwareness${formId}" id="socialAwareness${formId}">
              </div>
              <div class="form-group">
                <label>Medical Aid:</label>
                <input type="number" value="0" class="form-control medical-aid" name="medicalAid${formId}" id="medicalAid${formId}">
              </div>
            </form>
          `;
          $('.error-messagePan').hide();
        }

        formHtml += `<button type="submit" class="btn btn-primary" id="submitInvoices">Submit Invoices</button>`;
        $('.dyn_container').append(formHtml);
        $('input[type="number"]').on('keydown', function(event) {
          if (event.key === '-' || event.key === 'e') {
            event.preventDefault();
          }
        });
        $('input[type="radio"]').change(function() {
          var formId = $(this).closest('form').attr('id');
          var paymentMode = $(this).val();
          var chequeFields = $(`#${formId} .cheque-fields`);  
          var formData = formDictionary[formId];
          if (paymentMode === 'cheque') {
            chequeFields.show();
          } else {
            chequeFields.hide();
          }

          if (formData) {
            formData.paymentMode = paymentMode;
          }
        });
        $('.cheque-number').change(function() {
          var formId = $(this).closest('form').attr('id');
          var chequeNumber = $(this).val();
          var formData = formDictionary[formId];
          if (formData) {
            formData.chequeNumber = chequeNumber;
          }
        });
        $('.name').change(function() {
          var formId = $(this).closest('form').attr('id');
          var word = $(this).val();
          var formData = formDictionary[formId];
          if (formData) {
            formData.name = word;
          }
        });
        $('.amountInWords').change(function() {
          var formId = $(this).closest('form').attr('id');
          var word = $(this).val();
          var formData = formDictionary[formId];
          if (formData) {
            formData.amountInWords = word;
          }
        });
        $('.panCardNumber').on('input',function() {
          var formId = $(this).closest('form').attr('id');
          var panCardNumber = $(this).val();
          var formData = formDictionary[formId];
          var panCardRegex = /^[A-Z]{5}\d{4}[A-Z]$/;
          if (panCardNumber.match(panCardRegex)) {
            flag=0;
            $('#' + formId +' .error-messagePan').hide();
            if (formData) {
              formData.panCardNumber = panCardNumber;
            }
          } else {
            flag=1;
            $('#' + formId +' .error-messagePan').show().text('PAN card number is not valid.');
          }
        });
        $('.panCardNumber').change(function() {
          if(flag==1){
              $(this).val('');
          }
        })  
        $('.building-fund').change(function() {
          var formId = $(this).closest('form').attr('id');
          var building_Fund = parseInt($(this).val() || 0);
          var youthActivities = parseInt($('#' + formId + ' .youth-activities').val() || 0);
          var culturalPrograms = parseInt($('#' + formId + ' .cultural-programs').val() || 0);
          var socialAwareness = parseInt($('#' + formId + ' .social-awareness').val() || 0);
          var medicalAid = parseInt($('#' + formId + ' .medical-aid').val() || 0);
          var amountReceived = parseInt($('#' + formId + ' .amount-received').val() || 0);
          var limitSum = building_Fund+youthActivities+culturalPrograms+socialAwareness+medicalAid;
          if( limitSum > amountReceived){
              alert("Value Exceeded"); 
              $(this).val(0)
          }
          var formData = formDictionary[formId];
          if (formData) {
            formData.buildingFund = building_Fund;
          }
        });
        $('.youth-activities').change(function() {
          var formId = $(this).closest('form').attr('id');
          var youth_activites= parseInt($(this).val() || 0);
          var buildingFund = parseInt($('#' + formId + ' .building-fund').val() || 0);
          var culturalPrograms = parseInt($('#' + formId + ' .cultural-programs').val() || 0);
          var socialAwareness = parseInt($('#' + formId + ' .social-awareness').val() || 0);
          var medicalAid = parseInt($('#' + formId + ' .medical-aid').val() || 0);
          var amountReceived = parseInt($('#' + formId + ' .amount-received').val() || 0);
          var limitSum = buildingFund+youth_activites+culturalPrograms+socialAwareness+medicalAid;
          if( limitSum > amountReceived){
              alert("Value Exceeded"); 
              $(this).val(0)
          }
          var formData = formDictionary[formId];
          if (formData) {
            formData.youthActivities = youth_activites;
          }
        });
        $('.cultural-programs').change(function() {
          var formId = $(this).closest('form').attr('id');
          var cultural_programs = parseInt($(this).val() || 0);
          var youthActivities = parseInt($('#' + formId + ' .youth-activities').val() || 0);
          var buildingFund = parseInt($('#' + formId + ' .building-fund').val() || 0);
          var socialAwareness = parseInt($('#' + formId + ' .social-awareness').val() || 0);
          var medicalAid = parseInt($('#' + formId + ' .medical-aid').val() || 0);
          var amountReceived = parseInt($('#' + formId + ' .amount-received').val() || 0);
          var limitSum = buildingFund+youthActivities+cultural_programs+socialAwareness+medicalAid;
          if( limitSum > amountReceived){
              alert("Value Exceeded"); 
            $(this).val(0)
          }
          var formData = formDictionary[formId];
          if (formData) {
            formData.culturalPrograms = cultural_programs;
          }
        });
        $('.social-awareness').change(function() {
          var formId = $(this).closest('form').attr('id');
          var social_awareness = parseInt($(this).val() || 0);
          var youthActivities = parseInt($('#' + formId + ' .youth-activities').val() || 0);
          var culturalPrograms = parseInt($('#' + formId + ' .cultural-programs').val() || 0);
          var buildingFund = parseInt($('#' + formId + ' .building-fund').val() || 0);
          var medicalAid = parseInt($('#' + formId + ' .medical-aid').val() || 0);
          var amountReceived = parseInt($('#' + formId + ' .amount-received').val() || 0);
          var limitSum = buildingFund+youthActivities+culturalPrograms+social_awareness+medicalAid;
          if( limitSum > amountReceived){
              alert("Value Exceeded")
              $(this).val(0)
          }
          var formData = formDictionary[formId];
          if (formData) {
            formData.socialAwareness = social_awareness;
          }
        });
        $('.medical-aid').change(function() {
          var formId = $(this).closest('form').attr('id');
          var medical_aid = parseInt($(this).val() || 0);
          var youthActivities = parseInt($('#' + formId + ' .youth-activities').val() || 0);
          var culturalPrograms = parseInt($('#' + formId + ' .cultural-programs').val() || 0);
          var socialAwareness = parseInt($('#' + formId + ' .social-awareness').val() || 0);
          var buildingFund = parseInt($('#' + formId + ' .building-fund').val() || 0);
          var amountReceived = parseInt($('#' + formId + ' .amount-received').val() || 0);
          var limitSum = buildingFund+youthActivities+culturalPrograms+socialAwareness+medical_aid;
          if( limitSum > amountReceived){
              alert("Value Exceeded"); 
              $(this).val(0)
          }
          var formData = formDictionary[formId];
          if (formData) {
            formData.medicalAid = medical_aid;
          }
        });
        $(".cheque-date").datepicker({
          dateFormat: "dd MM yy",
          onSelect: function(dateText) {
          var formId = $(this).closest('form').attr('id');
          var formData = formDictionary[formId];
            if (formData) {
              formData.chequeDate = dateText;
            }
          }
        });

        $(".drawn-date").datepicker({
          dateFormat: "dd MM yy",
          onSelect: function(dateText) {
            var formId = $(this).closest('form').attr('id');
          var formData = formDictionary[formId];
            if (formData) {
              formData.chequedrawnDate = dateText;
            }
          }
        });
          $('#submitInvoices').click(function() {
            var forms = document.getElementsByTagName("form");
            var emptyFields = [];

            for (var i = 0; i < forms.length; i++) {
              var form = forms[i];
              var inputs = form.getElementsByTagName("input");

              for (var j = 0; j < inputs.length; j++) {
                var input = inputs[j];
                if (input.hasAttribute("required") && !input.value) {
                  var paymentMode = form.querySelector('input[name^="paymentMode"]:checked').value;
                  var inputName = input.getAttribute("name");
                  if (paymentMode === "cheque" && inputName.startsWith("cheque")) {
                    emptyFields.push(inputName);
                  } else if (paymentMode === "cash" && inputName.startsWith("cheque")) {
                    continue;
                  } else {
                    emptyFields.push(inputName);
                  }
                }
              }
            }

            if (emptyFields.length > 0) {
              alert("Please fill in the required fields");
            } else {
              console.log(formDictionary);
          $.ajax({
            type: 'POST',
            url: "{{ route('shreeFoundationAdd') }}",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
              'name': $('#name').val(),
              'date': $('#date').val(),
              'totalAmount': $('#totalAmount').val(),
              'address': $('#address').val(),
              'dynamicForm': formDictionary
            },
            success: function(data) {
              if (data == 'success') {
                swal("INVOICE CREATED", "", "success").then(function() {
                  location.reload();
                });
              } else {
                swal("SOMETHING WENT WRONG...", "PLEASE TRY AGAIN", "warning").then(function() {
                  location.reload();
                });
              }
            },
            error: function(data) {
              swal("SOMETHING WENT WRONG...", "PLEASE TRY AGAIN", "warning").then(function() {
                location.reload();
              });
            }
          });
            }
        });

      });
    });
  </script>
</body>
</html>