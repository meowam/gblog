<div class="col-lg-12">
    <div class="pageination">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                $params = $_GET;
                unset($params['curr_p']);
                $query_string = http_build_query($params); // создаем строку запроса из массива $_GET
                if ($curr_p > 1) {
                    echo "<li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=1'>Перша</a></li>";
                    $prevpage = $curr_p - 1;
                    echo "<a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$prevpage'><<</a> ";
                } else {
                    echo "<li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=1'>Перша</a></li>";
                    $prevpage = $curr_p - 1;
                    echo "<li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$prevpage'><<</a></li>";
                }

                // цикл, с помощью которого отобразим пагинацию (вокруг текущей страницы)
                for ($x = ($curr_p - $range); $x < (($curr_p + $range) + 1); $x++) {
                    // если номер страницы верный...
                    if (($x > 0) && ($x <= $totalpages)) {
                        // если страница текщая...
                        if ($x == $curr_p) {
                            // вывод текущей страницы
                            echo "  <li class='page-item active '><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$x'>$x</a></li>";
                            // если страница не текущая...
                        } else {
                            // вывод не текущей страницы
                            echo " <li class='page-item'><a class='page-link'  href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$x'>$x</a></li> ";
                        }
                    }
                }

                // формируем ссылки на последнюю и следующую страницу     
                if ($curr_p != $totalpages) {
                    $nextpage = $curr_p + 1;
                    echo " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$nextpage'>>></a><li> ";
                    echo " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$totalpages'>Остання</a><li> ";
                } else {
                    $nextpage = $curr_p + 1;
                    echo " <li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$nextpage'>>></a><li> ";
                    echo " <li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?$query_string&curr_p=$totalpages'>Остання</a><li> ";
                }
                ?>

            </ul>
        </nav>
    </div>
</div>