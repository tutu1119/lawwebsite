<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--引用jQuery核心函式庫-->
    <script src="interface/templates/js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="interface/templates/js/bootstrap.min.js"></script>
    <!--參考：http://jquery-howto.blogspot.com/2009/05/remove-nth-table-column-jquery-plugin.html-->
    <script type="text/javascript">
        $(document).ready(init); /*畫面上所有的DOM都載入後*/


        function init() {
            /*註冊removeCol函數*/
            $.fn.removeCol = function (col) {
                // Make sure col has value     
                if (!col) { col = 1; }
                $('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
                return this;
            };

        }
    </script>
</head>

<body>
    <table cellspacing="0" border="1">
        <thead>
            <th>
                CategoryID
            </th>
            <th>
                CategoryName
            </th>
            <th colspan="2">
                Description
            </th>
            <th >
                異動
            </th>
        </thead>
		</tbody>
        <tr>
            <td>
                1
            </td>
            <td>
                飲料
            </td>
            <td>
                軟性飲料,咖啡,啤酒,及麥酒
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                2
            </td>
            <td>
                調味品
            </td>
            <td>
                甜酸醬,配料,塗料,及香料
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                3
            </td>
            <td>
                點心
            </td>
            <td>
                甜點心,糖果,甜麵包
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                4
            </td>
            <td>
                日用品
            </td>
            <td>
                起司
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                5
            </td>
            <td>
                穀類/麥片
            </td>
            <td>
                麵包,餅干,麵糰,麥片
            </td>
            <td>
               <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                6
            </td>
            <td>
                肉/家禽
            </td>
            <td>
                肉品
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                7
            </td>
            <td>
                特製品
            </td>
            <td>
                水果乾及豆腐
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
        <tr>
            <td>
                8
            </td>
            <td>
                海鮮
            </td>
            <td>
                海帶及魚類
            </td>
            <td>
                <a href="http://www.google.com.tw" target="_blank">編輯</a>
            </td>
        </tr>
		<tbody>
    </table>
    <br />
    <input type="button"  value="隱藏" onclick="$('table').removeCol(4);" />
	<input type="checkbox" id="china_all" name="china_all" onclick="$('table').removeCol(4);"/> ALL
    <input type="button"  value="顯示" onclick="$('table').addCol(4);" />
</body>
</html>