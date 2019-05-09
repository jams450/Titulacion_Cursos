var range = $('.input-range'),
  value = $('.range-value');

value.html(range.attr('value') + ' km');

range.on('input', function() {
  value.html(this.value + ' km');
});