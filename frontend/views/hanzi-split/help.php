<?php

use yii\helpers\Html;
?>

<h2>部件笔画检字法介绍</h2>

<h3>一、问题的提出</h3>

<p>古籍电子化过程中，面临大量的生僻字，这些生僻字不仅一般的输入法无法输入，有些甚至字体文件都不包含，这就是所谓的“缺字问题”。解决“缺字问题”的核心在于对缺字进行合适的编码以及便利的检索。</p>

<h3>二、表意文字描述序列</h3>

<p>针对缺字问题，Unicode自3.0起，提出一种“表意文字描述序列（Ideographic Description Sequence，IDS）”的解决方案 。该解决包括两部分：1、表意文字组合符（Ideographic Description Character，IDC），包含12个结构符（⿰、⿱、⿲、⿳、⿴、⿵、⿶、⿷、⿸、⿹、⿺、⿻），描述是文字的结构特征；2、文字部件，是文字拆分后得到的更小的文字单位。</p>

<p>如下表所示：</p>

<div>
<table class="table table-striped table-bordered table-center">
<thead>
<tr><th>字符</th><th>意义</th><th>例字</th><th>示例</th>
</tr>
</thead>
<tbody>
<tr><td>⿰</td><td>左右结构，两个部件由左至右组成</td><td>相</td><td>⿰木目</td>
</tr>         
<tr><td>⿱</td><td>上下结构，两个部件由上至下组成</td><td>志</td><td>⿱士心</td>
</tr>
<tr><td>⿲</td><td>左中右结构，三个部件由左至右组成</td><td>瞮</td><td>⿲目育攵</td>
</tr>
<tr><td>⿳</td><td>上中下结构，三个部件由上至下组成</td><td>糞</td><td>⿳米田共</td>
</tr>
<tr><td>⿴</td><td>全包围结构，两个部件由外而内组成</td><td>回</td><td>⿴囗口</td>
</tr>
<tr><td>⿵</td><td>上包围结构，三面包围，下方开口</td><td>冋</td><td>⿵冂口</td>
</tr>
<tr><td>⿶</td><td>下包围结构，三面包围，上方开口</td><td>凶</td><td>⿶凵㐅</td>
</tr>
<tr><td>⿷</td><td>左包围结构，三面包围，右方开口</td><td>叵</td><td>⿷匚口</td>
</tr>
<tr><td>⿸</td><td>左上包围结构，两面包围，右、下开口</td><td>病</td><td>⿸疒丙</td>
</tr>
<tr><td>⿹</td><td>右上包围结构，两面包围，左、下开口</td><td>戴</td><td>⿹𢦏異</td>
</tr>
<tr><td>⿺</td><td>左下包围结构，两面包围，右、上开口</td><td>起</td><td>⿺走己</td>
</tr>
<tr><td>⿻</td><td>交叉结构，两个部件重叠</td><td>巫</td><td>⿻工从</td>
</tr>
</tbody>
</table>
</div>


<h3>三、“部件笔画检字法”编码</h3>
<p>本检字法的编码包括三部分内容：改进的表意文字描述序列、相似部件、总笔画。</p>

<h4>（一）改进的表意文字描述序列</h4>

<h5>1、结构符</h5>
<p>Unicode的方案中，某些字可能会有多种拆字方法，如“瞮”字，可拆为“⿲目育攵”“⿰目⿰育攵” “⿰⿰目育攵”等，为了消除这种拆分的歧义，本检字法取消“⿲”“⿳”两个结构符，分别用“⿰⿰”“⿱⿱”代替。对于N重左右结构，用N-1个连续⿰符号代替；对于N重上下结构，用N-1个连续⿱符号代替。
另外，Unicode 12个结构符号，三面包围中没有右包围结构，本检字法用“~⿷”（对左包围取反，字形水平翻动可得）来替代；两面包围中，没有右下包围结构，本检字法用“~⿺”（对左下包围取反，字形水平翻动可得）替代。</p>

<p>本检字法所采用的结构符如下：</p>
<div>
<table class="table table-striped table-bordered table-center">
<thead>
<tr><th>字符</th><th>意义</th><th>例字</th><th>示例</th>
</tr>
</thead>
<tbody>
<tr><td>⿰</td><td>左右结构，两个部件由左至右组成</td><td>相</td><td>⿰木目</td>
</tr>
<tr><td>⿰⿰</td><td>三重左右结构，三个部件由左至右组成</td><td>瞮</td><td>⿲目育攵</td>
</tr>
<tr><td>⿰⿰⿰</td><td>四重左右结构，四个部件由左至右组成</td><td>衚</td><td>⿰⿰⿰彳古月亍</td>
</tr>
<tr><td>⿱</td><td>上下结构，两个部件由上至下组成</td><td>志</td><td>⿱士心</td>
</tr>
       
<tr><td>⿱⿱</td><td>三重上下结构，三个部件由上至下组成</td><td>糞</td><td>⿱⿱米田共</td>
</tr>
<tr><td>⿱⿱⿱</td><td>四重上下结构，四个部件由上至下组成</td><td>稁</td><td>⿱⿱⿱亠口冖禾</td>
</tr>
<tr><td>⿴</td><td>全包围结构，两个部件由外而内组成</td><td>回</td><td>⿴囗口</td>
</tr>
<tr><td>⿵</td><td>上包围结构，三面包围，下方开口</td><td>冋</td><td>⿵冂口</td>
</tr>
<tr><td>⿶</td><td>下包围结构，三面包围，上方开口</td><td>凶</td><td>⿶凵㐅</td>
</tr>
<tr><td>⿷</td><td>左包围结构，三面包围，右方开口</td><td>叵</td><td>⿷匚口</td>
</tr>
<tr><td>~⿷</td><td>右包围结构，三面包围，左方开口</td><td>𨤏</td><td>~⿷⿱𠃍一采</td>
</tr>
<tr><td>⿸</td><td>左上包围结构，两面包围，右、下开口</td><td>病</td><td>⿸疒丙</td>
</tr>
<tr><td>⿹</td><td>右上包围结构，两面包围，左、下开口</td><td>戴</td><td>⿹𢦏異</td>
</tr>
<tr><td>⿺</td><td>左下包围结构，两面包围，右、上开口</td><td>起</td><td>⿺走己</td>
</tr>
<tr><td>~⿺</td><td>右下包围结构，两面包围，左、上开口</td><td>-</td><td>-</td>
</tr>
<tr><td>⿻</td><td> 交叉结构，两个部件重叠</td><td>巫</td><td>⿻工从</td>
</tr>
</tbody>
</table>
</div>



<h5>2、拆分序列</h5>
<p>“表意文字描述序列”可由一颗拆分树来表达。比如：</p>
<p> “高”字拆分树如下：</p>
 
<p>“湘”字拆分树如下：</p>
 
<p>拆分树有多种记录方式：</p>
<p>1、  初步拆分。“初步拆分”指的是尽可能用大的部件来表达，使得部件数量最少。如“⿱⿱亠口冋”“⿰氵相”。这种表达式存储的是拆分树中靠上层的信息；</p>
<p>2、  彻底拆分。“彻底拆分”指的是将部件拆分的尽量小，使得部件数量最多。如“⿱⿱亠口⿵冂口”“⿰⿰氵木目”。这种表达方式存储的是拆分树中靠底层的信息；</p>
<p>3、  混合拆分。“混合拆分”记录的是从“初步拆分”到“彻底拆分”的整个过程，将还可以继续拆分的部件以尖括号括起来，从而存储拆分树从上到下的所有的结构和部件信息。如“⿱⿱亠口<冋>⿵冂口”“ ⿰氵\<相\>⿰木目”。</p>
<p>“初步拆分”相对简洁，主要用于人工拆分。“彻底拆分”用于检验基本部件选择的合理性。将所有汉字的彻底拆分放在一起，然后做一个字频统计，便可以得到检字法所采用的字根（最小拆分单元）以及对应的使用频率，从而可以判断字根选取的合理性。“混合拆分”主要用于检索，用户无论输入该汉字的哪个部件，都能检索到该字。</p>
<p>在算法实现时，“彻底拆分”“混合拆分”可由“初步拆分”递归实现，无须人工拆分。</p>
<p>3、一字多拆</p>
<p>有些字可能有多种拆分方法。如“主”字，可以拆分为“⿱丶王”“ ⿱亠土”；“羆”字可以拆分为“⿱罒熊”“⿱罷灬”。对于这种情况，都需要予以记录，这样才能保证“无论用户如何拆分，都能检索到该字”。</p>
<p>4、缺失部件</p>
有些字在拆分时，缺乏对应的部件，此时可用笔画来表达，如“仺”字可拆为“⿱人3”。

<h4>（二）相似部件</h4>
<p>对于某些部件复杂、不易输入的汉字，定义一些“相似部件”，从而增加检索的便利性。例如，部件“丏”不易输入，可定义相似部件“丐”。</p>

<h4>（三）总笔画</h4>
<p>该检字法的数据库中，将存储汉字的总笔画信息。然而汉字的笔画却不一定是一个确定的数字，如“禝”字，有人认为是14画，有人认为是15画。此时，可都予以记录。</p>

<h3>四、“部件笔画检字法”检索规则</h3>
<p>与编码规则相应，检索规则也包含三部分内容：改进的表意文字描述序列、相似部件、总笔画。检索式由这三部分构成。</p>
<h4>（一） 改进的表意文字描述序列</h4>
<p>检索式中第一部分的内容为改进的表意文字描述序列。</p>
<h5>1、部件</h5>
<p>检索式中，按照从左到右、从上到下、从外到里的顺序，用户可以输入所能见到的任何部件。比如输入“氵相”“氵木”“氵目”检索“湘”字；输入“亠口冋”“亠口口”检索“高”字等。
<h5>2、结构</h5>
<p>检索式中，可以输入部件的结构信息，这样能降低返回结果，更易于查找。如输入“⿰氵相”“⿰氵木”“⿰氵目”检索“湘”字；输入“⿱亠口冋”“ ⿱亠口口”检索“高”字等。输入结构信息时，要输入有把握、能确定的结构信息，否则，可能因结构信息有误而查不到想要的字。</p>
<h5>3、兼容部件</h5>
<p>对于某些生僻而不易输入的部件，系统选取一些与其结构相近的常用部件作为替代，即“兼容部件”。如下表所示：</p>
生僻部件    兼容部件
乀 ⺄ 乙
𠤎   七
丏   丐
亻   人
𠆢   人
<p>这样，用户输入“⿴口乙”时，可检索到“𡆡”字。在具体应用中，兼容部件可设置为一个开关，默认为启用状态。</p>
<p>需要注意的是，与“相似部件”不同，兼容部件只是一个检索概念，不是一个编码、存储的概念。</p>
<h5>4、通配符?</h5>
<p>检索式中，对于不便输入的部件，可以用?来代替。如输入“ ⿱亠口⿵?口”检索“高”字。</p>

<h4>（二） 相似部件</h4>
<p>检索式中第二部分的内容为相似部件，相似部件以~开头。如入“~丐”，可以检索“𧉄”字。</p>

<h4>（三） 笔画</h4>
<p>检索式中第三部分的内容为笔画数。</p>
<h5>1、剩余笔画</h5>
<p>检索式中，可以输入剩余笔画数n来进行检索。如输入“⿰氵相0”“⿰氵木5”“⿰氵目4”检索“湘”字；输入“⿱亠口冋0”“ ⿱亠口口2”检索“高”字等。</p>
<h5>2、总笔画</h5>
<p>检索式中，用户也可以输入总笔画“=n”来进行检索。如输入“⿰氵相=12”检索“湘”字；输入“⿱亠口冋=10”检索“高”字等。</p>
<p>总笔画主要用于二次检索。当用户第一次检索输入剩余笔画时，系统将通过查找各部件笔画+剩余笔画的方式得到总笔画，将检索式修改为总笔画的表达方式。比如用户第一次输入“⿱亠口5”进行检索，结果返回时，系统自动将表达式修改为“⿱亠口=10”。此时如果没有找到合适的字，则用户只需要修改部件即可迅速进行第二次检索。</p>
<h5>3、笔画范围</h5>
<p>检索式中，用户可以输入剩余笔画范围“n-m”，或总笔画范围“=n-m”进行检索。如“⿰氵木5-7”，或“ ⿱亠口=9-11”。</p>

<h3>五、拆字任务登记表</h3>
<p>为了完成“部件笔画检字法”，需要登记以下字段：</p>
<p>字形  初步拆分1   初步拆分2   初步拆分3   初步拆分4   相似部件    总笔画
主   ⿱丶王 ⿱亠土             5
羆   ⿱罒熊 ⿱罷灬         四皿  19
㧊   ⿰扌⿻一巾               市   7
仺   ⿱人3             彐   6
</p>


 <?php
$cssString = " p{ text-indent:30px; font-size:15px;}";  
$this->registerCss($cssString); 
