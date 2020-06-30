<nav class="lnb_wrap">
	<div class="lnb_con">
		<div class="lnb_show">환경설정</div>
		<ul class="lnb_menu">
            <li>
				<a href="#none" class="menu_name">프랜차이즈</a>
				<ul class="lnb_sub_menu">
					<li><a href="/manager/set/franReg" class="<?=($lCode == '0111' ? ' on' : '')?>">프랜차이즈 등록</a></li>
					<li><a href="/manager/set/franList" class="<?=($lCode == '0112' ? ' on' : '')?>">프랜차이즈리스트</a></li>
				</ul>
			</li>
			<li>
				<a href="#none" class="menu_name">매장</a>
				<ul class="lnb_sub_menu">
					<li><a href="/manager/set/" class="<?=($lCode == '0101' ? ' on' : '')?>">매장정보 설정</a></li>
					<?php if($User->corpCode() == 3){ ?>
					<li><a href="/manager/set/addCorp" class="<?=($lCode == '0102' ? ' on' : '')?>">매장추가</a></li>
					<li><a href="/manager/set/corpList" class="<?=($lCode == '0103' ? ' on' : '')?>">매장리스트</a></li>
					<?php } ?>
					<li><a href="/manager/set/corpSet" class="<?=($lCode == '0104' ? ' on' : '')?>">매장선택</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
