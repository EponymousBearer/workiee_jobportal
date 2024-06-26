<?php
session_start();
// Include the configuration file and any necessary functions
include 'config.php';
$pageTitle = 'Companies - Workiee';
include 'includes/header.php';
// Retrieve all companies from the 'companies' table
$sql = "SELECT * FROM companies";
$result = $conn->query($sql);
?>
<section class="bg-orange-100 text-black">
  <div class="mx-auto max-w-screen-xl px-4 py-28 lg:flex lg:h-1/2 lg:items-center">
    <div class="mx-auto max-w-3xl text-center">
      <h1
        class="bg-gradient-to-r from-blue-800 to-orange-500 bg-clip-text px-4 md:px-0 text-3xl font-extrabold text-transparent sm:text-5xl">
        Find Best Company <span class="sm:block"> For Your Career! </span>
      </h1>
    </div>
  </div>
</section>
<div class="mx-auto gap-4 w-full p-8 md:p-10 lg:py-10 lg:px-12 max-w-screen-2xl flex flex-col md:flex-row md:grid md:grid-cols-2 lg:grid-cols-3">
  <?php
  // Check if there are companies to display
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // Output each company's details
      echo '<article
            class="rounded-lg border border-gray-300 bg-white p-4 w-full shadow-sm transition hover:shadow-lg sm:p-6"
          >
          <div class="flex gap-x-3">
            <span class="inline-block rounded bg-orange-500 p-2 text-white">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                />
              </svg>
            </span>
          
            <a href="#">
              <h3 class="mt-1 text-lg font-medium text-gray-900">
                ' . $row['name'] . '
              </h3>
            </a>
            </div>
            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            ' . $row['description'] . '
            </p>
          
            <a href="#" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-orange-800">
            ' . $row['industry'] . '
          
              <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                &rarr;
              </span>
            </a>
          </article>
          ';
    }
  } else {
    echo "<p class='w-full text-start py-10 text-2xl text-gray-600'>No companies found.</p>";
  }
  ?>
  </body>

  </html>