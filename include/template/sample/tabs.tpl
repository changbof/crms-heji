<{include file ="header.tpl"}>
<{include file ="navibar.tpl"}>
<{include file ="sidebar.tpl"}>

<style type="text/css">
	.nav-tabs > li .close {
	    margin: -2px 0 0 10px;
	    font-size: 18px;
	}
	.marginBottom {
	    margin-bottom :1px !important;
	}
	.operationDiv {
	    padding:5px 10px 5px 5px;
	}
	.operationDivWrapper {
	    margin-top:-1px;
	}
	.leftMenu {
	    height :70%;
	    background-color: #E6E6E6;
	    border-right: 2px solid #BFBFBF;
	}
			
</style>
<div class="well">
	<div class="container-fluid ">
	    <ul class="nav nav-tabs marginBottom" id="myTab">
	        <li class="active "><a href="#home" class="backgroundRed">Inbox </a>

	        </li>
	        <li><a href="#profile"><button class="close closeTab" type="button" >×</button>Sent</a>

	        </li>
	        <li><a href="#messages"><button class="close closeTab" type="button" >×</button>Compose</a>

	        </li>
	        <li><a href="#settings"><button class="close closeTab" type="button" >×</button> Re:this is test subject</a>

	        </li>
	    </ul>
	    <div>
	        <div class="operationDiv">
	            <button type="submit" class="btn" id="composeButton">Compose</button>
	        </div>
	    </div>
	    <div class="row-fluid ">
	        <div class="row-fluid ">
	            <div class="span2 leftMenu">
	                <ul class="nav nav-pills nav-stacked">
	                    <li class="active">	<a href="#">Inbox</a>

	                    </li>
	                    <li><a href="#">Sent</a>

	                    </li>
	                    <li><a href="#">Trash</a>

	                    </li>
	                </ul>
	            </div>
	            <div class="tab-content span4">
	                <div class="tab-pane active" id="home">Inbox</div>
	                <div class="tab-pane" id="profile">sent</div>
	                <div class="tab-pane" id="messages">Compose1</div>
	                <div class="tab-pane" id="settings">Re:This is test</div>
	            </div>
	        </div>
	    </div>
	</div>

</div>

<script type="text/javascript">
var currentTab;
var composeCount = 0;
//initilize tabs
$(function () {

    //when ever any tab is clicked this method will be call
    $("#myTab").on("click", "a", function (e) {
        e.preventDefault();

        $(this).tab('show');
        $currentTab = $(this);
    });


    registerComposeButtonEvent();
    registerCloseEvent();
});

//this method will demonstrate how to add tab dynamically
function registerComposeButtonEvent() {
    /* just for this demo */
    $('#composeButton').click(function (e) {
        e.preventDefault();

        var tabId = "compose" + composeCount; //this is id on tab content div where the 
        composeCount = composeCount + 1; //increment compose count

        $('.nav-tabs').append('<li><a href="#' + tabId + '"><button class="close closeTab" type="button" >×</button>Compose</a></li>');
        $('.tab-content').append('<div class="tab-pane" id="' + tabId + '"></div>');

        craeteNewTabAndLoadUrl("", "./SamplePage.html", "#" + tabId);

        $(this).tab('show');
        showTab(tabId);
        registerCloseEvent();
    });

}

//this method will register event on close icon on the tab..
function registerCloseEvent() {

    $(".closeTab").click(function () {

        //there are multiple elements which has .closeTab icon so close the tab whose close icon is clicked
        var tabContentId = $(this).parent().attr("href");
        $(this).parent().parent().remove(); //remove li of tab
        $('#myTab a:last').tab('show'); // Select first tab
        $(tabContentId).remove(); //remove respective tab content

    });
}

//shows the tab with passed content div id..paramter tabid indicates the div where the content resides
function showTab(tabId) {
    $('#myTab a[href="#' + tabId + '"]').tab('show');
}
//return current active tab
function getCurrentTab() {
    return currentTab;
}

//This function will create a new tab here and it will load the url content in tab content div.
function craeteNewTabAndLoadUrl(parms, url, loadDivSelector) {

    $("" + loadDivSelector).load(url, function (response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error getting details ! ";
            $("" + loadDivSelector).html(msg + xhr.status + " " + xhr.statusText);
            $("" + loadDivSelector).html("Load Ajax Content Here...");
        }
    });

}

//this will return element from current tab
//example : if there are two tabs having  textarea with same id or same class name then when $("#someId") whill return both the text area from both tabs
//to take care this situation we need get the element from current tab.
function getElement(selector) {
    var tabContentId = $currentTab.attr("href");
    return $("" + tabContentId).find("" + selector);

}


function removeCurrentTab() {
    var tabContentId = $currentTab.attr("href");
    $currentTab.parent().remove(); //remove li of tab
    $('#myTab a:last').tab('show'); // Select first tab
    $(tabContentId).remove(); //remove respective tab content
}

</script>
<!-- TPLEND 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<{include file="footer.tpl" }>