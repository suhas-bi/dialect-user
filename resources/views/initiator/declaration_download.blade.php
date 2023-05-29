<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Black & White</title>

    <style type="text/css">

body {
  font-size: small;
  line-height: 1.4;
}
p {
  margin: 0;
}

.performance-facts {
  border: 1px solid black;
  margin: 30px;
  float: left;
  width: 90%;
  padding: 0.5rem;
  table {
    border-collapse: collapse;
  }
}
.performance-facts__title {
  font-weight: bold;
  font-size: 2rem;
  margin: 0 0 0.25rem 0;
}
.performance-facts__header {
  border-bottom: 10px solid black;
  padding: 0 0 0.25rem 0;
  margin: 0 0 0.5rem 0;
  p {
    margin: 0;
  }
}
.performance-facts__table {
  width: 100%;
  thead tr {
    th,
    td {
      border: 0;
    }
  }
  th,
  td {
    font-weight: normal;
    text-align: left;
    padding: 0.25rem 0;
    border-top: 1px solid black;
    white-space: nowrap;
  }
  td {
    &:last-child {
      text-align: right;
    }
  }
  .blank-cell {
    width: 1rem;
    border-top: 0;
  }
  .thick-row {
    th,
    td {
      border-top-width: 5px;
    }
  }
}
.small-info {
  font-size: 0.7rem;
}

.performance-facts__table--small {
  @extend .performance-facts__table;
  border-bottom: 1px solid #999;
  margin: 0 0 0.5rem 0;
  thead {
    tr {
      border-bottom: 1px solid black;
    }
  }
  td {
    &:last-child {
      text-align: left;
    }
  }
  th,
  td {
    border: 0;
    padding: 0;
  }
}

.performance-facts__table--grid {
  @extend .performance-facts__table;
  margin: 0 0 0.5rem 0;
  td {
    &:last-child {
      text-align: left;
      &::before {
        content: "•";
        font-weight: bold;
        margin: 0 0.25rem 0 0;
      }
    }
  }
}

.text-center {
  text-align: center;
}
.thick-end {
  border-bottom: 10px solid black;
}
.thin-end {
  border-bottom: 1px solid black;
}


    </style>
</head>
<body>


<section class="performance-facts">
  <header class="performance-facts__header">
    <h1 class="performance-facts__title text-center">Dialect B2B</h1>
    <p></p>
  </header>
  <table class="performance-facts__table">
    <tbody>
        <tr>
            <th class="blank-cell">Company Name</th>
            <td>{{ $company['name'] }}</td>
        </tr>
        <tr>
            <th class="blank-cell">Company Address </th>
            <td>{{ $company['address'] }}, <br>{{ $company['zone'] }}, {{ $company['street'] }},<br> {{ $company['building'] }}, {{ $company['unit'] }},<br> {{ $company['pobox'] }}</td>
        </tr>
        <tr>
            <th scope="row">Operation Regions</th>
            <td>
                @foreach($company['locations'] as $key => $location)
                {{ $location['name'] ?? '' }}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th scope="row">Company Website </th>
            <td>
            {{ $company['domain'] }}
            </td>
        </tr>
        <tr>
            <th scope="row">Company Fax </th>
            <td>
            {{ $company['country_code'].' '.$company['fax'] }}
            </td>
        </tr>
        <tr>
            <th scope="row">Company Logo </th>
            <td>
                <img src="images/company-logo.png" alt="">
            </td>
        </tr>
        <tr>
            <th scope="row">Business Categories</th>
            <td>
                @foreach($company['activities'] as $key => $activity)
                {{ $activity['name'] ?? '' }}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th scope="row">CR License</th>
            <td>
                CR License No: {{ $company->document->doc_number ?? '' }}<br>
                Expiry Date: {{ $company->document->expiry_date ?? '' }}
            </td>
        </tr>
    </tbody>
  </table>


  <p class="small-info text-center">
    Signature & Seal
  </p>

</section>
</body>
</html>