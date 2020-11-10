# 11주차 학습회고

## 1.새로 배운 내용
  1. ClassNotFoundException
  - 드라이브를 설정할 때 오류가 발생하는 것을 말함.
  2. executeQuery
  - 쿼리를 동작시키는 메소드
  3. ResultSet
  - next라는 메소드를 통해서 하나하나씩 읽어올 수 있는 메소드
  4. statement, prepareStatement, callableStatement
  - callableStatement는 storedprocedure를 사용할때 사용한다.
  - statement들은 sql쿼리를 전달하는 역할, 반드시 예외처리 해야한다.
  - statement는 정적 sql문을 사용한다. 생성되면 해석하는 건 아니고 미리 입력되어있는 것을 전달하고 가져오는 것이다.,
  반면 prepare는 sql문을 담아서 보낸다. ?는 placeholder이다. 한번 분석되고나면 계속 재사용할 수 있다는 장점이 있다. 
  동적쿼리들을 처리가능하며 똑같은 sql문인데 값만 바뀌는 것에 사용된다.
  기호 신경쓰지 않고 처리가능하다.('등)
  먼저 컴파일되니 실행시간의 인수값을 위한 공간을 확보하고한다. 그래서 실행시간 빠르게된다.
  5. executeUpdate
  - 하난지 두갠지 update 확인하는것.

## 2. 문제가 발생하거나 고민한 내용 + 해결과정
  - 오늘은 딱히 문제가 발생하지 않았다. 중간에 무결성 오류가 발생하였지만 강의를 통해 해결할 수 있었다.

## 3.참고할 만한 내용
  - sqldeveloper의 글씨가 너무 작게 나와서 바꿀 수 있는 방법을 찾아보았다. 링크(https://itprogramming119.tistory.com/entry/Oracle-SQL-Developer-01-%EA%B8%80%EC%9E%90%ED%8F%B0%ED%8A%B8-%ED%81%AC%EA%B8%B0-%EB%B0%94%EA%BE%B8%EA%B8%B0)

## 4.회고
- +마지막 리팩토링을 통해 한꺼번에 객체화를 해서 좋았다. -> 객체화를 조금 더 능숙하게 할 수 있게 해주는 것 같다.(정리해서 배우는 느낌이다.)
- -딱히 없었다.
- !commit을 하지 않으면 오라클 서버에는 변경이 되지 않으니 커밋을 생활화해야겠다는 생각을 했다.



[동영상 동작 링크](https://youtu.be/oOz9unu1-IM)
