@extends('welcome')

@section('konten')
<div class="container">
    <h1 id="judul">Movies Watch List</h1>
    <form>
      <div class="form">
        <input type="text" name="name" id="name" placeholder="Movie Name" required=""
          style="width: 500px; height: 25px;">
      </div>
      <p></p>
      <div class="form">
        <input type="number" name="rating" id="rating" class="name" placeholder="Movie Rating" required=""
          style="width: 500px; height: 25px;">
      </div>
      <p></p>
      <button type="submit" class="save" style="height: 30px;">ADD MOVIE</button>
      <input type="text" id="search" placeholder="cari...">
    </form><br>
    <table width="1000px" class="datatabel">
      <thead style="background-color: blue; border: none; color: white; height: 50px;">
        <th>Movie Title</th>
        <th>Movie Rating</th>
        <th>Action</th>
      </thead>
      <tbody id="body" style="border-bottom: 1px; border-color: black;">

      </tbody>
    </table>
  </div>
  <script type="text/javascript">
    var movieTitle = ["50 First Dates", "Eternals", "Fast and Furious 9", "Gundala", "Rio", "Spiderman: No Way Home", "The Conjuring", "The Kingsman", "Train to Busan", "Uncharted"];
    var movieRating = ["0.0", "2.7", "5.4", "0.8", "9.5", "9.2", "8.6", "9.1", "0.5", "1.2"];
    var judul = document.getElementById('judul');
    judul.style.color = 'blue';

    for (var i = 0; i < movieTitle.length; i++) {
      $(".datatabel tbody").append("<tr name='" + movieTitle[i] + "' rating='" + movieRating[i] + "'><td>" + movieTitle[i] + "</td><td>" + movieRating[i] + "</td><td><button class='delete' type='button'>Delete</button></td></tr>")
    }
    $("form").submit(function (e) {
      e.preventDefault();
      var name = $("input[name='name']").val();
      var rating = $("input[name='rating']").val();

      $(".datatabel tbody").append("<tr name='" + name + "' rating='" + rating + "'><td>" + name + "</td><td>" + rating + "</td><td><button class='delete' type='button'>Delete</button></td></tr>");

      var inputtitle = document.getElementById('name');
      movieTitle.push(inputtitle.value);
      inputtitle.value = '';

      var inputrating = document.getElementById('rating');
      movieRating.push(inputrating.value);
      inputrating.value = '';
    });

    $('body').on('click', '.delete', function () {
      $(this).parents('tr').remove();
    });

    $('th').click(function () {
      var table = $(this).parents('table').eq(0)
      var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
      this.asc = !this.asc
      if (!this.asc) { rows = rows.reverse() }
      for (var i = 0; i < rows.length; i++) { table.append(rows[i]) }
    })
    function comparer(index) {
      return function (a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
      }
    }
    function getCellValue(row, index) { return $(row).children('td').eq(index).text() }

    $("#search").keyup(function () {
      var value = this.value.toLowerCase().trim();

      $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
          var id = $(this).text().toLowerCase().trim();
          var not_found = (id.indexOf(value) == -1);
          $(this).closest('tr').toggle(!not_found);
          return not_found;
        });
      });
    });

  </script>
</div>
@endsection