<!DOCTYPE html>
<html class="h-full bg-gray-100"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect"
        href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:500,600,700"
        rel="stylesheet" />
    <link rel="preconnect"
        href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:500,600,700"
        rel="stylesheet" />
</head>

<body onload="print()" class="bg-gray-100 font-poppins">
    <div>
      <div>
        <div style="text-align: center; font-size: 20pt; font-weight: bold;">Maternal Recording System in Barangay Biwang,
          Bagumbayan Sultan Kudarat</div>
        <p style="font-size: 1.25rem; font-weight: 600; text-align: center; margin-top: 20px;">
            Per Gender
        </p>
      </div>
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Type</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Count</th>
        </tr>
        <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
          <tr style="background-color: #D9D9D9; height: 18.75pt;">
            <th style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">Gender</th>
            <th style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">No. of Infants</th>
          </tr>
          <tr>
            <td style="border: 1px solid #000000; padding: 3.75pt;">
              Male
            </td>
            <td style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">
              {{ $male }}
            </td>
          </tr>
          <tr>
            <td style="border: 1px solid #000000; padding: 3.75pt;">
              Female
            </td>
            <td style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">
              {{ $female }}
            </td>
          </tr>
        </table>
      </table>
    </div>
    <script>
      print(){
        windows.print()
      }
    </script>
</body>
</html>
