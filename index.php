<?php
/**
 * The main theme template file
 *
 * The main templates that includes DOCTYPE and html tag.
 * All other parts are included in 'partial' directory.
 *
 * @todo Add [role] and [aria].
 * @todo Include shortcuts for screen reader.
 *
 * @package Lighthalzen
 * @subpackage Rekenber
 *
 * @link https://github.com/yuoa/lighthalzen#readme
 * @author Jio Gim (CiTE 5th)
 * @copyright Yuoa (Jio Gim)
 *
**/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php

        // Two cases: Mainpage vs Subpage
        if ( is_front_page() ) :
            get_template_part('partial/head/main');
        else:
            get_template_part('partial/head/sub');
        endif;

        // Insert common part at last
        get_template_part('partial/head/common');

    ?>
</head>
<body id="begin">
    <?php get_header(); ?>
    <noscript>
        <div class="js-disclaimer">
            <h3><?php _t("JavaScript 비활성화 알림"); ?></h3>
            <p><?php _t("JavaScript가 비활성화되어 있습니다. 일부 브라우저에서 페이지 표시에 문제가 생길 수 있습니다."); ?></p>
        </div>
    </noscript>
    <main id="content">
        <article>
            <div>
                <section>
                    <h1>개발자는 뭘 하고 있는가 (실시간)</h1>
                    <p><em><b><h3>밥 먹는 중</h3></b></em><s>좁은 가로 길이 화면에서의 메뉴 표출 구현중</s></p>
                </section>
                <section>
                    <h1>08. 07. (화) 목표</h1>
                    <ol>
                        <li>최상단 바로가기 버튼 구현</li>
                        <li>상단 메뉴 margin/top 수식이 어느 환경에서도 성립하는지 재확인</li>
                        <li>모바일 메뉴 구현</li>
                        <li>슬라이더 구현</li>
                    </ol>
                </section>
                <section>
                    <h1> 08. 08. (수) 목표</h1>
                    <ol>
                        <li>푸터 완성</li>
                        <li>검색 페이지 완성</li>
                        <li>404 페이지 제작</li>
                        <li>모두 펼치기 기능 완성</li>
                    </ol>
                </section>
                <section>
                    <h1>08. 09. (목) 목표</h1>
                    <ol>
                        <li>메뉴 받아서 세부 페이지 및 메인 페이지 동시 개발 시작</li>
                    </ol>
                </section>
                <section>
                    <h1>헤더 개발</h1>
                    <p><s>1. 상단 메뉴 드롭다운 디자인</s> 완료</p>
                    <p>2. 모두 펼치기 기능 구현</p>
                    <p>3. 버튼 속 메뉴 구현</p>
                    <p><s>4. 플로팅 메뉴 구현</s> 완료</p>
                    <p>5. 반응형 테스트</p>
                    <p><s>6. 초기 로드 시 Transition Off</s> 완료</p>
                    <p><s>7. 버튼 tabindex 취소</s> 완료</p>
                    <p>8. 학과 로고 언어/플로팅 각각의 이미지 적용</p>
                    <p><s>9. 플로팅 시 메뉴 디자인 변경</s> 완료</p>
                    <p>10. 슬라이더 구현</p>
                    <p><s>11. 언어 버튼 디자인 재고려</s> 완료</p>
                    <p><s>12. em => rem 단위 변경 및 재계산</s> 완료</p>
                    <p><s>13. 복잡한 calc 계산식 구조화 및 단순화 혹은 비-calc 크기로 교체</s> 완료</p>
                    <p><s>14. scss 구조 재설계</s> 완료</p>
                    <p>15. max-content 속성의 구버전 브라우저를 위한 추가 JS 적용</p>
                    <p><s>16. 플로팅 바 transition 추가</s> 완료</p>
                    <p><s>17. 디자인 리마스터</s> 완료</p>
                    <p><s>18. 상단 메뉴 radius 추가</s> 완료</p>
                    <p><s>19. focus에의 브라우저 css 덮어쓰기</s> 완료</p>
                    <p>20. 최상단 바로가기 버튼 추가</p>
                    <p>21. &lt;title&gt; 어트리뷰트 메뉴 적용</p>
                </section>
                <section>
                    <h1>푸터 개발</h1>
                    <p>1차 개발중</p>
                </section>
            </div>
        </article>
    </main>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p><p>Contents</p>
    <?php get_footer(); ?>
    <div id="go-top">
        <a href="#top"><?php _t("제일 위로"); ?></a>
    </div>
</body>
</html>
