<?php

/*--------------------------------------------------
  Custom numeric pagaintion
---------------------------------------------------*/

function get_pagination($range = 3){

  global $paged, $listings;

  if (empty($max_page)) {
    $max_page = $listings->max_num_pages;
  }

  if ($max_page > 1) {
    echo '<div class="numeric-pagination flex-center">';

    if (!$paged) {
      $paged = 1;
    }

    // if ($paged >= ($max_page - $range)){
    //   echo '<a href="'.get_pagenum_link(1).'" class="button'.(1 == $paged ? ' current' : '').'">1</a>';
    //   echo '<span class="icon icon-ellipsis"></span>';
    // }

    if ($max_page > $range) {
      if ($paged < $range) {
        for ($i = 1; $i <= ($range + 1); $i++) {
          if ($i != $max_page) {
            echo '<a href="'.get_pagenum_link($i).'" class="button'.($i == $paged ? ' current' : '').'">'.$i.'</a>';
          }
        }
      }

      elseif ($paged >= ($max_page - ceil(($range/2)))) {
        for ($i = $max_page - $range; $i <= $max_page; $i++) {
          if ($i != $max_page) {
            echo '<a href="'.get_pagenum_link($i).'" class="button'.($i == $paged ? ' current' : '').'">'.$i.'</a>';
          }
        }
      }

      elseif ($paged >= $range && $paged < ($max_page - ceil(($range/2)))) {
        for ($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++) {
          if ($i != $max_page) {
            echo '<a href="'.get_pagenum_link($i).'" class="button'.($i == $paged ? ' current' : '').'">'.$i.'</a>';
          }
        }
      }
    }

    else{
      for ($i = 1; $i <= $max_page; $i++) {
        if ($i != $max_page) {
          echo '<a href="'.get_pagenum_link($i).'" class="button'.($i == $paged ? ' current' : '').'">'.$i.'</a>';
        }
      }
    }

    if ($paged > ($max_page - $range)){
      echo '<a href="'.get_pagenum_link($max_page).'" class="button'.($max_page == $paged ? ' current' : '').'">'.$max_page.'</a>';
    } else{
      echo '<span class="icon icon-ellipsis"></span>';
      echo '<a href="'.get_pagenum_link($max_page).'" class="button'.($max_page == $paged ? ' current' : '').'">'.$max_page.'</a>';
    }

    echo '</div>';
  }
}

// add_filter('next_posts_link_attributes', 'posts_link_attributes');
// add_filter('previous_posts_link_attributes', 'posts_link_attributes');
//
// function posts_link_attributes() {
//   return 'class="link"';
// }









//
// function get_pagination($range = 4){
//
//
//   global $paged, $listings;
//
//   if (empty($max_page)) {
//     $max_page = $listings->max_num_pages;
//   }
//
//   if ($max_page > 1) {
//     echo '<div class="section-numeric-pagination spacing"><div class="container-medium flex-center">';
//
//     if (!$paged) {
//       $paged = 1;
//     }
//
//     // if ($paged != 1) {
//     //   echo "<a class='button-arrow' href=".get_pagenum_link(1).">First</a>";
//     // }
//
//     // previous_posts_link('Hello');
//
//     if ($max_page > $range) {
//       if ($paged < $range) {
//         for ($i = 1; $i <= ($range + 1); $i++) {
//           echo "<a href='".get_pagenum_link($i)."' class='button button-black";
//           if ($i == $paged){
//             echo " current'";
//           }
//           echo "'>$i</a>";
//         }
//       }
//
//       elseif ($paged >= ($max_page - ceil(($range/2)))) {
//         for ($i = $max_page - $range; $i <= $max_page; $i++) {
//           echo "<a href='".get_pagenum_link($i)."'";
//           if ($i == $paged) {
//             echo "class='current'";
//           }
//           echo ">$i</a>";
//         }
//       }
//
//       elseif ($paged >= $range && $paged < ($max_page - ceil(($range/2)))) {
//         for ($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++) {
//           echo "<a href='" . get_pagenum_link($i) ."'";
//           if ($i == $paged){
//             echo "class='button current'";
//           } else{
//             echo "class='button'";
//           }
//           echo ">$i</a>";
//         }
//       }
//     }
//
//     else{
//       for ($i = 1; $i <= $max_page; $i++) {
//         echo "<a href='".get_pagenum_link($i)."' class='button button-black";
//         if ($i == $paged){
//           echo " current'";
//         }
//         echo "'>$i</a>";
//       }
//     }
//
//     // next_posts_link('Hello');
//
//     // if ($paged != $max_page) {
//     //   echo "<a class='button-arrow' href=".get_pagenum_link($max_page).">Last</a>";
//     // }
//
//     echo '</div></div>';
//   }
// }
//
// add_filter('next_posts_link_attributes', 'posts_link_attributes');
// add_filter('previous_posts_link_attributes', 'posts_link_attributes');
//
// function posts_link_attributes() {
//   return 'class="link"';
// }
