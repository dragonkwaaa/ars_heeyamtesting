<?php include $_SERVER['DOCUMENT_ROOT'] . '/manager/common/pages/head.php';
$mCode					=	'01';
$lCode					=	'0102';
if($User->corpCode() != 3){
	$CommonManager->goPage('/manager/set/');
}
?>
<body>
<div class="container">
	<!-- gnb -->
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/manager/common/pages/header.php'; ?>
	<div class="wrapper">
		<!-- lnb -->
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/manager/set/pages/set_left.php'; ?>

		<div class="contents">

			<!-- :: 기본 정보 파트 -->
			<form id="frm" onkeypress="if(event.keyCode==13) {return false;}">
				<input type="hidden" name="token" value="<?=$_SESSION['token'][$Common->nowPage()]?>">
				<input type="hidden" name="isNew" value="Y">
				<input type="hidden" name="idx" value="0">
				<input type="hidden" name="isDel_1" value="0">
				<input type="hidden" name="isDel_2" value="0">
				<input type="hidden" name="isDel_3" value="0">
				<input type="hidden" name="isDel_4" value="0">
				<input type="hidden" name="isDel_5" value="0">

				<input type="hidden" name="oldImg1" value="">
				<input type="hidden" name="oldImg2" value="">
				<input type="hidden" name="oldImg3" value="">
				<input type="hidden" name="oldImg4" value="">
				<input type="hidden" name="oldImg5" value="">

				<div class="set_field">
					<div class="field_title">
						<span class="title_mark">■</span>
						<span>기본정보</span>
						<span class="f_main tip">(*)는 필수 입력 사항입니다.</span>
					</div>
					<table class="set_table">
						<colgroup>
							<col width="120">
							<col width="*">
						</colgroup>
						<tbody>
                        <tr>
                            <th>매장유형</th>
                            <td>
                                <div class="franSelcGroup">
                                    <label class="">
							        	<input type="radio" name="FranCheck" value="0">
							        	<span>프랜차이즈</span>
							        </label>
                                    <label class="ml10">
							        	<input type="radio" name="FranCheck" value="1" checked="">
							        	<span>개인사업자</span>
							        </label>
                                </div>
                            </td>
                        </tr>
                        <tr class="franSetGroup hide">
                            <th>프랜차이즈 선택</th>
                            <td>
                                <span class="sbox">
							    	<select>
							    		<option value="">도미노피자</option>
							    		<option value="">피자에땅</option>
							    	</select>
							    </span>
                            </td>
                        </tr>
						<tr>
							<th>매장이미지</th>
							<td>
								<div class="f_main">* 권장 이미지 사이즈는 720*350 픽셀입니다.</div>
								<div class="f_main">* 섬네일을 클릭하면 큰 이미지가 표시됩니다.</div>
								<div class="storeImgSmall">
									<?php for($i = 1 ; $i <= 5 ; $i ++){ ?>
										<div class="sizeFixImg">
											<div class="imgUploadBox">
												<input type="file" class="hide" accept="image/*" name="img_<?= $i?>" onchange="img_sel(this, event)">
												<a href="javascript:void(0)" class="upload_btn" onclick="img_upload(this)"></a>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="storeImgBig">
									<div class="sizeFixImg">
										<img class="hide" src="" alt="미리보기" id="showImg">
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>
								<span>매장명</span>
								<span class="f_main" >*</span>
							</th>
							<td><input class="tbox long" value="" name="corpName"></td>
						</tr>
						<tr>
							<th>
								<span>서브도메인</span>
								<span class="f_main" >*</span>
							</th>
							<td><input class="tbox long" value="" name="subdomain"></td>
						</tr>
						<!--<tr>
							<th>
								<span>서브도메인</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<input class="tbox long" value="" id="subdomain" name="subdomain">
								<a href="javascript:checkSubdomin()" class="addRegularClose_1 btn normal higher col_main f_w alignV ml15">중복확인</a>
							</td>
						</tr>-->
						<tr>
							<th>부제</th>
							<td><input class="tbox long" value="" name="corpSubName"></td>
						</tr>
						<tr>
							<th>
								<span>최소주문금액</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<input class="tbox small onlyNum" value="" name="minPrice">
								<span>원</span>
								<span class="f_main tip">* 미입력시 최소주문금액은 "-" 으로 표시됩니다.</span>
							</td>
						</tr>
						<tr>
							<th>
								<span>기본배달시간</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<input class="tbox onlyNum" value="" name="deliveryTimeS">
								<span>~</span>
								<input class="tbox onlyNum" value="" name="deliveryTimeE">
								<span>분</span>
							</td>
						</tr>
						<tr>
							<th>
								<span>배달요금</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<input class="tbox small" value="" name="deliveryPrice">
								<span>원</span>
								<span class="f_main tip">* 미입력시 배달요금은 "-" 으로 표시됩니다.</span>
							</td>
						</tr>
						<tr>
							<th>
								<div>결제방법</div>
								<span>(중복선택가능)</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<label>
									<input type="checkbox" name="payType[]" value="1" id="payType1">
									<span>현금결제</span>
								</label>
								<label>
									<input type="checkbox" name="payType[]" value="2" id="payType2">
									<span>카드결제</span>
								</label>
							</td>
						</tr>
						<tr>
							<th>
								<span>매장유형</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<label>
									<input type="checkbox" name="corpType[]" value="1" id="corpType1">
									<span>배달전문</span>
								</label>
								<label class="ml10">
									<input type="checkbox" name="corpType[]" value="2" id="corpType2">
									<span>테이크아웃/매장방문 가능</span>
								</label>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="set_field">
					<div class="field_title">
						<span class="title_mark">■</span>
						<span>매장정보</span>
					</div>
					<table class="set_table">
						<colgroup>
							<col width="120">
							<col width="*">
						</colgroup>
						<tbody>
						<tr>
							<th>매장설명</th>
							<td>
								<textarea class="textbox long" name="corpInfo" id="corpInfo"></textarea>
							</td>
						</tr>
						<tr>
							<th>vorder 전화번호</th>
							<td>
								<input class="tbox onlyNum" value="" name="corpPhone1">
								<span> - </span>
								<input class="tbox onlyNum" value="" name="corpPhone2">
								<span> - </span>
								<input class="tbox onlyNum" value="" name="corpPhone3">
								<a href="javascript:checkCorpPhone()" class="addRegularClose_1 btn normal higher col_main f_w alignV ml15">중복확인</a>
							</td>
						</tr>
						<tr>
							<th>매장 전화번호</th>
							<td>
								<input class="tbox long" value="" name="corpDirectPhone" id="corpDirectPhone">
							</td>
						</tr>
						</tbody>
					</table>
				</div>

				<div class="set_field">
					<div class="field_title">
						<span class="title_mark">■</span>
						<span>영업정보</span>
					</div>
					<table class="set_table">
						<colgroup>
							<col width="120">
							<col width="*">
						</colgroup>
						<tbody>
						<tr>
							<th>
								<span>영업시간</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<select class="tbox" name="openTime" id="openTime">
									<option value="">- 선택 -</option>
									<?php for($i = 0; $i < 25; $i++){?>
										<option value="<?= $i?>"><?= $i?>시</option>
									<?php } ?>
								</select>
								<span>:</span>
								<select class="tbox" name="openMin">
									<?php for($i = 0; $i < 6; $i++){?>
										<option value="<?= $i.'0'?>"><?= $i?>0분</option>
									<?php } ?>
								</select>
								<span>~</span>
								<select class="tbox" name="closeTime">
									<option value="">- 선택 -</option>
									<?php for($i = 0; $i < 25; $i++){?>
										<option value="<?= $i?>"><?= $i?>시</option>
									<?php } ?>
								</select>
								<span>:</span>
								<select class="tbox" name="closeMin">
									<?php for($i = 0; $i < 6; $i++){?>
										<option value="<?= $i.'0'?>"><?= $i?>0분</option>
									<?php } ?>
								</select>
								<label class="ml10">
									<input type="checkbox" name="isOnTime" value="1">
									<span>체크시 영업시간 외에는 주문을 받지 않습니다.</span>
								</label>
							</td>
						</tr>
						<tr>
							<th>정기휴무일</th>
							<td>
								<div class="regularClose">
									<!-- <div class="closeDateBox">
										<select class="tbox">
											<option value="">- 선택 -</option>
											<option value="">매주 첫째</option>
											<option value="">매주 둘째</option>
											<option value="">매주 셋째</option>
											<option value="">매주 넷째</option>
											<option value="">매주 다섯째</option>
											<option value="">매주 여섯째</option>
										</select>
										<select class="tbox">
											<option value="">일요일</option>
											<option value="">월요일</option>
											<option value="">화요일</option>
											<option value="">수요일</option>
											<option value="">목요일</option>
											<option value="">금요일</option>
											<option value="">토요일</option>
										</select>
									</div> -->
								</div>
								<span class="addCloseDate">
								<a href="javascript:add_regularHoliday()" class="addRegularClose_1 btn smaller higher col_main f_w alignV">추가</a>
								<span class="f_main alignV">* 선택한 휴무일이 없을 경우, "연중무휴" 로 표시됩니다.</span>
							</span>
							</td>
						</tr>
						<tr>
							<th>임시휴무일</th>
							<td>
								<div class="temporalClose">
									<!-- <div class="closeDateBox">
										<input class="tbox"value="">
									</div> -->
								</div>
								<div class="addCloseDate">
									<a href="javascript:void(0)" class="addTempClose_1 btn smaller higher col_main f_w alignV">추가</a>
								</div>
							</td>
						</tr>
						<!-- :: 국가지정공휴일을 휴무일로 설정할지에 대한 체크박스(사용/미사용 검토중)  -->
						<!-- <tr>
							<th>공휴일설정</th>
							<td>
								<label>
									<input type="checkbox">
									<span>체크시 공휴일을 휴무일로 지정</span>
								</label>
							</td>
						</tr> -->
						</tbody>
					</table>
				</div>
				<div class="set_field">
					<div class="field_title">
						<span class="title_mark">■</span>
						<span>위치정보</span>
					</div>
					<table class="set_table">
						<colgroup>
							<col width="120">
							<col width="*">
						</colgroup>
						<tbody>
						<tr>
							<th>
								<span>주소</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<div>
									<input type="hidden" id="zip" name="corpZip">
									<input class="tbox long" value="" name="corpAddr1" id="addr1" readonly onclick="openPostcode();">
									<a href="javascript:openPostcode()" class="btn smaller higher col_main f_w">검색</a>
								</div>
								<div class="mt5">
									<input class="tbox long" value="" placeholder="상세주소를 입력해주세요." name="corpAddr2" id="addr2">
								</div>
							</td>
						</tr>
						<tr>
							<th>배달가능지역</th>
							<td>
								<textarea class="textbox long" name="deliveryInfo"></textarea>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="set_field">
					<div class="field_title">
						<span class="title_mark">■</span>
						<span>사업자정보</span>
					</div>
					<table class="set_table">
						<colgroup>
							<col width="120">
							<col width="*">
						</colgroup>
						<tbody>
						<tr>
							<th>대표자명</th>
							<td><input class="tbox normal" value="" name="ceoName"></td>
						</tr>
						<tr>
							<th>상호명</th>
							<td><input class="tbox long" value="" name="corpBrandName"></td>
						</tr>
						<tr>
							<th>사업자등록번호</th>
							<td><input class="tbox long onlyNum" value="" name="corpNum"></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="set_field">
					<div class="field_title">
						<span class="title_mark">■</span>
						<span>원산지정보</span>
					</div>
					<table class="set_table">
						<colgroup>
							<col width="120">
							<col width="*">
						</colgroup>
						<tbody>
						<tr>
							<th>
								<span>원산지표시</span>
								<span class="f_main">*</span>
							</th>
							<td>
								<textarea class="textbox long" name="originMark"></textarea>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</form>
			<div class="btn_group">
				<a href="javascript:insert_corp()" class="btn col_main" id="setButton">등록</a>
			</div>
		</div>
	</div>
</div>
<script src="/manager/common/js/exif-js.js"></script>
<script src="/manager/common/js/imgSet.js"></script>
<script src="/manager/set/js/index.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>

	// :: 상품 카테고리 추가 스크립트
	$(document).on('click', '.cateAdd_1', function(){

		var str 		=	'';

		// str			+=	'<div class="menu_list">';

		str			+=	'<tr>';
		str			+=	'	<td>';
		str			+=	'		<label>';
		str			+=	'			<input type="checkbox" name="goods" value="<?=$goodsCode?>">';
		str			+=	'		</label>';
		str			+=	'	</td>';
		str			+=	'	<td>';
		str			+=	'		<div>';
		str			+=	'			<a href="javascript:void(0);" class="btn moveUp">▲</a>';
		str			+=	'		</div>';
		str			+=	'		<div>1</div>';
		str			+=	'		<div>';
		str			+=	'			<a href="javascript:void(0);" class="btn moveDown">▼</a>';
		str			+=	'		</div>';
		str			+=	'	</td>';
		str			+=	'	<td>';
		str			+=	'		<input class="tbox full center" value="">';
		str			+=	'	</td>';
		str			+=	'	<td>';
		str			+=	'		12';
		str			+=	'	</td>';
		str			+=	'	<td>';
		str			+=	'		<div class="optStatChkBox">';
		str			+=	'			<label>';
		str			+=	'				<input type="radio" name="goodsStatus" value="" checked="">';
		str			+=	'				<span>사용</span>';
		str			+=	'			</label>';
		str			+=	'		</div>';
		str			+=	'		<div class="optStatChkBox">';
		str			+=	'			<label>';
		str			+=	'				<input type="radio" name="goodsStatus" value="">';
		str			+=	'				<span>미사용</span>';
		str			+=	'			</label>';
		str			+=	'		</div>';
		str			+=	'		<div class="optStatChkBox">';
		str			+=	'			<label>';
		str			+=	'				<input type="radio" name="goodsStatus" value="">';
		str			+=	'				<span>품절</span>';
		str			+=	'			</label>';
		str			+=	'		</div>';
		str			+=	'	</td>';
		str			+=	'	<td>';
		str			+=	'		<span>';
		str			+=	'			<a href="javascript:void(0);" class="btn small col_darkGrey f_w">삭제</a>';
		str			+=	'		</span>';
		str			+=	'	</td>';
		str			+=	'</tr>';

		$('.optionList_1 .list_table tbody').append(str);
	});





    // :: 프랜차이즈/개인사업자 중, 프랜차이즈를 선택했을 때 나타나는 업체 선택 드롭박스. 
    $(document).on('click', '.franSelcGroup input[type="radio"]', function(){

        if ($(this).val() == ('0')) {
              $(".franSetGroup").removeClass('hide');
        } else if ($(this).val() == ('1')) {
            $(".franSetGroup").addClass('hide');
        }



    });











</script>
</body>
</html>
