<?php

$rows = mysqli_fetch_row($cntqry);
$total_records = $rows[0];
$total_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_pages - 1;
$prev_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacent = 2;
$pagLink = "<ul class='pagination'>";

if ($total_pages > 1) {

    if ($page_no > 1)
        $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$prev_page'>" . " << Prev" . "</a></li>";
    if ($total_pages <= 10) {
        for ($counter = 1; $counter <= $total_pages; $counter++) {
            if ($counter == $page_no) {
                $pagLink .= "<li class='active-page' ><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
            } else {
                $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
            }
        }
    } else {
        if ($page_no <= 4) {
            for ($counter = 1; $counter <  8; $counter++) {
                if ($counter == $page_no) {
                    $pagLink .= "<li class='active-page' ><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
                } else {
                    $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
                }
            }
            $pagLink .= "<li><a class='page-link' > ... </a></li>";
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$second_last'>" . $second_last . "</a></li>";
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$total_pages'>" . $total_pages . "</a></li>";
        } else if ($page_no > 4 && $page_no < $total_pages - 4) {
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=1'>1 </a></li>";
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=2'>2</a></li>";
            $pagLink .= "<li><a class='page-link' > ... </a></li>";
            for ($counter = $page_no - $adjacent; $counter <= $page_no + $adjacent; $counter++) {
                if ($counter == $page_no) {
                    $pagLink .= "<li class='active-page' ><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
                } else {
                    $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
                }
            }
            $pagLink .= "<li><a class='page-link' > ... </a></li>";
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$second_last'>" . $second_last . "</a></li>";
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$total_pages'>" . $total_pages . "</a></li>";
        } else {
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=1'>1 </a></li>";
            $pagLink .= "<li><a class='page-link' href='$page_link?page_no=2'>2</a></li>";
            $pagLink .= "<li><a class='page-link' > ... </a></li>";
            for ($counter = $total_pages - 6; $counter <= $total_pages; $counter++) {
                if ($counter == $page_no) {
                    $pagLink .= "<li class='active-page' ><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
                } else {
                    $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$counter'>" . $counter . "</a></li>";
                }
            }
        }
    }
    if ($page_no < $total_pages)
        $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$next_page'>" . "Next >>" . "</a></li>";
    if ($page_no < $total_pages)
        $pagLink .= "<li><a class='page-link' href='$page_link?page_no=$total_pages'>" . "Last" . "</a></li>";
    echo $pagLink . "</ul>";
}
?>
<html>

</html>