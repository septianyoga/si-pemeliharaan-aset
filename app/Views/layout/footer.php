<script src="<?= base_url('admin/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('admin/js/popper.min.js') ?>"></script>
<script src="<?= base_url('admin/js/moment.min.js') ?>"></script>
<script src="<?= base_url('admin/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('admin/js/simplebar.min.js') ?>"></script>
<script src="<?= base_url('admin/js/daterangepicker.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.stickOnScroll.js') ?>"></script>
<script src="<?= base_url('admin/js/tinycolor-min.js') ?>"></script>
<script src="<?= base_url('admin/js/config.js') ?>"></script>
<script src="<?= base_url('admin/js/d3.min.js') ?>"></script>
<script src="<?= base_url('admin/js/topojson.min.js') ?>"></script>
<script src="<?= base_url('admin/js/datamaps.all.min.js') ?>"></script>
<script src="<?= base_url('admin/js/datamaps-zoomto.js') ?>"></script>
<script src="<?= base_url('admin/js/datamaps.custom.js') ?>"></script>
<script src="<?= base_url('admin/js/Chart.min.js') ?>"></script>
<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="<?= base_url('admin/js/gauge.min.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.sparkline.min.js') ?>"></script>
<script src="<?= base_url('admin/js/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('admin/js/apexcharts.custom.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.mask.min.js') ?>"></script>
<script src="<?= base_url('admin/js/select2.min.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.steps.min.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.timepicker.js') ?>"></script>
<script src="<?= base_url('admin/js/dropzone.min.js') ?>"></script>
<script src="<?= base_url('admin/js/uppy.min.js') ?>"></script>
<script src="<?= base_url('admin/js/quill.min.js') ?>"></script>
<script src="<?= base_url('admin/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('admin/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- sweet alert js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
  $('.select2').select2({
    theme: 'bootstrap4',
  });
  $('.select2-multi').select2({
    multiple: true,
    theme: 'bootstrap4',
  });
  $('#dataTable-1').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [16, 32, 64, -1],
      [16, 32, 64, "All"]
    ]
  });
  $('.drgpicker').daterangepicker({
    singleDatePicker: true,
    timePicker: true,
    showDropdowns: true,
    locale: {
      format: 'YYYY-MM-DD hh-mm-ss A'
    }
  });
  $('.time-input').timepicker({
    'scrollDefault': 'now',
    'zindex': '9999' /* fix modal open */
  });
  /** date range picker */
  if ($('.datetimes').length) {
    $('.datetimes').daterangepicker({
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'YYYY-MM-DD hh-mm-ss A'
      }
    });
  }
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  }
  $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);
  cb(start, end);
  $('.input-placeholder').mask("00/00/0000", {
    placeholder: "__/__/____"
  });
  $('.input-zip').mask('00000-000', {
    placeholder: "____-___"
  });
  $('.input-money').mask("#.##0,00", {
    reverse: true
  });
  $('.input-phoneus').mask('(000) 000-0000');
  $('.input-mixed').mask('AAA 000-S0S');
  $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/,
        optional: true
      }
    },
    placeholder: "___.___.___.___"
  });
  // editor
  var editor = document.getElementById('editor');
  if (editor) {
    var toolbarOptions = [
      [{
        'font': []
      }],
      [{
        'header': [1, 2, 3, 4, 5, 6, false]
      }],
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [{
          'header': 1
        },
        {
          'header': 2
        }
      ],
      [{
          'list': 'ordered'
        },
        {
          'list': 'bullet'
        }
      ],
      [{
          'script': 'sub'
        },
        {
          'script': 'super'
        }
      ],
      [{
          'indent': '-1'
        },
        {
          'indent': '+1'
        }
      ], // outdent/indent
      [{
        'direction': 'rtl'
      }], // text direction
      [{
          'color': []
        },
        {
          'background': []
        }
      ], // dropdown with defaults from theme
      [{
        'align': []
      }],
      ['clean'] // remove formatting button
    ];
    var quill = new Quill(editor, {
      modules: {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
  }
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script>
  var uptarg = document.getElementById('drag-drop-area');
  if (uptarg) {
    var uppy = Uppy.Core().use(Uppy.Dashboard, {
      inline: true,
      target: uptarg,
      proudlyDisplayPoweredByUppy: false,
      theme: 'dark',
      width: 770,
      height: 210,
      plugins: ['Webcam']
    }).use(Uppy.Tus, {
      endpoint: 'https://master.tus.io/files/'
    });
    uppy.on('complete', (result) => {
      console.log('Upload complete! We’ve uploaded these files:', result.successful)
    });
  }
</script>
<script src="<?= base_url('admin/js/apps.js') ?>"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>
<?php if ($title == "Dashboard") { ?>
  <script>
    function generateData(e, t, o) {
      for (var a = 0, r = []; a < t;) {
        var s = Math.floor(750 * Math.random()) + 1,
          i = Math.floor(Math.random() * (o.max - o.min + 1)) + o.min,
          l = Math.floor(61 * Math.random()) + 15;
        r.push([s, i, l]), a++
      }
      return r
    }
    var columnChart, columnChartoptions = {
        series: [{
          name: "Orders",
          data: [100, 66, 44, 55, 41, 24, 67, 22, 43, 32, 66, 44, 55, 41, 24, 67, 22, 43]
        }, {
          name: "Visitors",
          data: [7, 30, 13, 23, 20, 12, 8, 13, 27, 7, 30, 13, 23, 20, 12, 8, 13, 27]
        }],
        chart: {
          type: "bar",
          height: 350,
          stacked: !1,
          columnWidth: "70%",
          zoom: {
            enabled: !0
          },
          toolbar: {
            show: !1
          },
          background: "transparent"
        },
        dataLabels: {
          enabled: !1
        },
        theme: {
          mode: colors.chartTheme
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: "bottom",
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            horizontal: !1,
            columnWidth: "40%",
            radius: 30,
            enableShades: !1,
            endingShape: "rounded"
          }
        },
        xaxis: {
          type: "datetime",
          categories: ["01/01/2020 GMT", "01/02/2020 GMT", "01/03/2020 GMT", "01/04/2020 GMT", "01/05/2020 GMT", "01/06/2020 GMT", "01/07/2020 GMT", "01/08/2020 GMT", "01/09/2020 GMT", "01/10/2020 GMT", "01/11/2020 GMT", "01/12/2020 GMT", "01/13/2020 GMT", "01/14/2020 GMT", "01/15/2020 GMT", "01/16/2020 GMT", "01/17/2020 GMT", "01/18/2020 GMT"],
          labels: {
            show: !0,
            trim: !0,
            minHeight: void 0,
            maxHeight: 120,
            style: {
              colors: colors.mutedColor,
              cssClass: "text-muted",
              fontFamily: base.defaultFontFamily
            }
          },
          axisBorder: {
            show: !1
          }
        },
        yaxis: {
          labels: {
            show: !0,
            trim: !1,
            offsetX: -10,
            minHeight: void 0,
            maxHeight: 120,
            style: {
              colors: colors.mutedColor,
              cssClass: "text-muted",
              fontFamily: base.defaultFontFamily
            }
          }
        },
        legend: {
          position: "top",
          fontFamily: base.defaultFontFamily,
          fontWeight: 400,
          labels: {
            colors: colors.mutedColor,
            useSeriesColors: !1
          },
          markers: {
            width: 10,
            height: 10,
            strokeWidth: 0,
            strokeColor: "#fff",
            fillColors: [extend.primaryColor, extend.primaryColorLighter],
            radius: 6,
            customHTML: void 0,
            onClick: void 0,
            offsetX: 0,
            offsetY: 0
          },
          itemMargin: {
            horizontal: 10,
            vertical: 0
          },
          onItemClick: {
            toggleDataSeries: !0
          },
          onItemHover: {
            highlightDataSeries: !0
          }
        },
        fill: {
          opacity: 1,
          colors: [base.primaryColor, extend.primaryColorLighter]
        },
        grid: {
          show: !0,
          borderColor: colors.borderColor,
          strokeDashArray: 0,
          position: "back",
          xaxis: {
            lines: {
              show: !1
            }
          },
          yaxis: {
            lines: {
              show: !0
            }
          },
          row: {
            colors: void 0,
            opacity: .5
          },
          column: {
            colors: void 0,
            opacity: .5
          },
          padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          }
        }
      },
      columnChartCtn = document.querySelector("#columnChartCustom");
    columnChartCtn && (columnChart = new ApexCharts(columnChartCtn, columnChartoptions)).render();
  </script>
<?php } ?>