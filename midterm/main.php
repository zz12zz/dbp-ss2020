<!DOCTYPE html>
<html>

<head>
    <meta charser-"uft-8">
    <title> 올림픽 데이터 분석 </title>
</head>

<body>
    <center><h1>역대 올림픽 데이터 분석(1896-2014)</h1></center>
    <br><br><br>
    <h3>메달 획득 나라 TOP</h3>
    <h3>선수 관련 데이터 조회</h3>
    <form action="country_inform.php" method="POST">
        <h4>(1) 나라 정보 조회 </h4>
         무슨나라를 조회할까요? <input type="text" name="name" placeholder="영어 국가명입력">
         <input type="submit" value="조회">
    </form>
    <form action="country_top.php" method="POST">
          <h4>(2) 매달 획득 나라 TOP </h4>
        <input type="radio" name="season" value = "summer" checked> 하계
        <input type="radio" name="season" value = "winter"> 동계
        <select name ="medal"> 순위
          <option value = 'gold'>Gold</option>
          <option value = 'silver'>Silver</option>
          <option value = 'bronze'>Bronze</option>
        </select><br><br>
        몇 순위까지 조회할까요? <input type="text" name="number" placeholder="숫자만 입력해주세요">
        <input type="submit" value="조회">
    </form>
    <br><br>
    <h3>선수 관련 데이터 조회</h3>
    <form action="summer_top.php" method="POST">
        <h4>(1) 하계 매달 순위 TOP </h4>
         몇 순위까지 조회할까요? <input type="text" name="number" placeholder="숫자만 입력해주세요">
         <input type="submit" value="조회">
    </form>
    <form action="winter_top.php" method="POST">
      <h4>  (2) 동계 매달 순위 TOP </h4>
         몇 순위까지 조회할까요? <input type="text" name="number" placeholder="숫자만 입력해주세요">
         <input type="submit" value="조회">
    </form>
    <form action="both.php" method="POST">
      <h4>  (3) 하계,동계 모두 매달을 획득한 선수 조회 <input type="submit" value="GO"> </h4>

    </form>

</body>

</html>
