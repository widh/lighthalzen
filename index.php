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
                    <p><em><b><h3>슬라이더 제작 이전에, 관리자가 쉽게 슬라이더 항목을 입력할 수 있도록 관리자 페이지 만드는중</h3></b></em>with 정승원의 svg들</p>
                </section>
                <section>
                    <h1>개발 환경과 대응 환경</h1>
                    <p>현재 대개 개발 환경에서 완벽히 작동하며, 테스트 환경 및 이외의 환경에서는 잘 작동하지 않을 수 있음</p>
                    <h3>주 개발 환경</h3>
                    <dl>
                        <dt>Desktop</dt>
                        <dd>Chrome 70.0.3514.0 (공식 빌드) canary (64비트) (cohort: Clang-64)<br></dd>
                        <dt>Mobile (Android)</dt>
                        <dd>Chrome 68.0.3440.85 (공식 빌드) (32비트)</dd>
                    </dl>
                    <h3>테스트 환경</h3>
                    <h5>Desktop</h5>
                    <ul>
                        <li>Chrome 67.0.3396.99 (공식 빌드) (64비트) (cohort: Stable)</li>
                        <li>Chrome 69.0.3497.23 (공식 빌드) beta (64비트) (cohort: Beta)</li>
                        <li>Chrome 70.0.3514.0 (공식 빌드) canary (64비트) (cohort: Clang-64)</li>
                        <li>Firefox Quantum 61.0.1 (64비트)</li>
                        <li>Firefox Developer Edition 62.0b14 (64비트)</li>
                        <li>네이버 웨일 1.3.51.6 (공식 빌드) , 18. 8. 6. 오후 8:13:37 (64비트)</li>
                        <li>Internet Explorer 11.1000.17730.0</li>
                        <li>Microsoft Edge 44.17730.1000.0</li>
                        <li>Vivaldi 1.15.1147.55 (Stable channel) (32비트)</li>
                    </ul>
                    <h5>Mobile (Android)</h5>
                    <ul>
                        <li>Chrome 68.0.3440.85 (공식 빌드) (32비트)</li>
                        <li>Chrome 68.0.3440.91 (공식 빌드) beta (32비트)</li>
                        <li>Chrome 69.0.3497.24 (공식 빌드) dev (32비트)</li>
                        <li>Chrome 70.0.3512.0 (공식 빌드) canary (32비트)</li>
                        <li>CM Browser 5.22.18.0006</li>
                        <li>Dolphin V12.0.11</li>
                        <li>Edge 42.0.0.2233</li>
                        <li>Firefox Focus 6.0 (Build #21861909)</li>
                        <li>Firefox 61.0</li>
                        <li>Maxthon Mobile Browser 4.5.10.1300 Build 2964</li>
                        <li>Opera 47.1.2249.129326</li>
                        <li>Opera Mini 35.3.2254.129226</li>
                        <li>Opera Touch 1.9.0</li>
                        <li>Samsung Internet 7.2.10.33</li>
                        <li>Samsung Internet 7.4.00.69 BETA</li>
                        <li>UC Browser 12.8.8.1140</li>
                        <li>Whale 0.10.2.0 beta</li>
                    </ul>
                    <h3>환경 대응</h3>
                    <p>데스크탑/모바일 모두 99.5% 이상, 스크린 리더, NO CSS, NO JS 환경</p>
                </section>
                <section>
                    <h1>08. 07. (화) 목표</h1>
                    <ol>
                        <li><s>최상단 바로가기 버튼 구현</s> 완료</li>
                        <li><s>상단 메뉴 margin/top 수식이 어느 환경에서도 성립하는지 재확인</s></li>
                        <li><s>모바일 메뉴 구현</s> 완료</li>
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
                        <li>브라우저 호환성 중간점검 및 대응</li>
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
    <?php get_footer(); ?>
    <div id="go-top">
        <a href="#top"><?php _t("제일 위로"); ?></a>
    </div>
</body>
</html>
