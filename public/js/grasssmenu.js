$(document).ready(function () {
    $.ajax({
        type: "get",
        url: msource,
        dataType: "json",
        success: function (response) {
            gm = response;
        }
    });
    $(".mta").change(mtaChange);
    $(".viewswitcher").change(switchViews);
    $("#button-reset").click(resetSearch);
    $("#search").keyup(doSearch);
    qPMin = $("#inputGroupSelect00");
    qPMax = $("#inputGroupSelect01");
    $("#button-reset").click(function (e) {
        resetSearch();
        setTimeout(mtaChange, 50);
    });
    fSearch = $("#frmSearch");
    mtaChange();
    fCSc = fCSM = fSearch.serialize();
    fSearch.change(fsUpdate);

});
let fSearch = null;
let fCSM = "",fCSc = "";
let gm = [];
let sp = [false,false,false,false];
const sv_sativa = 0x0, sv_indica = 0x1, sv_hybrid = 0x2,sv_acc = 0x4;
function mtaChange() { 
    $(".mta").each(function (index, element) {
        let tid = "#m"+element.id;
        let st = $(tid);
        if(element.checked){
            st.addClass("active show");
        }else{
            st.removeClass("active show");
        }
        
        sp[index] = element.checked;
    });
};

let searchMode = false;
let prevTab = null;
let qPMin = null, qPMax = null;
function switchViews(){

}

function resetSearch(){
    $("#menuTabs .nav-item").show();
    $("#sr").hide();
    $("#dserch").removeClass("active").hide();
    searchMode = false;
    
    if(prevTab) { prevTab.addClass("active show") };
    $("#sr").removeClass("active show");
    $("#sr-tab").removeClass("active");
    $("#button-reset").hide();

    mtaChange();
}

function doSearch(){
    if(fCSM === fCSc){
        return resetSearch();
    }

    let sq = ($(this).val());

    showSearch(sq);

}

function showSearch(q){
    if(!searchMode){
        $("#menuTabs .nav-item").stop().hide("slow");
        $("#dserch").removeClass('d-none').show().click();
        
        prevTab = $("#menuTabContent .tab-pane.active");

        $("#sr").addClass("active show").show();
        $("#sr-tab").addClass("active disabled");
        prevTab.removeClass("active show");
        
        $("#button-reset").show();
    }
    searchMode = true;
}
let fCSH = null;
let searchCache = {};
function fsUpdate(){
    
    if(fCSc === fSearch.serialize())return; //input debouncing
    fCSc = fSearch.serialize();
    sha256(fCSc).then((hash) => {
        fCSH = hash;
        if(searchCache.hasOwnProperty(fCSH)){
            //load search results 
        }
        console.log("UpdateSearch "+fCSH);
    });
    showSearch();
    /*$("#sr").load(msource, fCSc, function (response, status, request) {
            this; // dom element
            
        });*/
    $.post(msource,fCSc,
        function (resp) {
            searchCache[fCSH] = resp;
            if(resp.hasOwnProperty("fCSH") && resp.fCSH == fCSH){

            }
        }
    );
}

async function sha256(message) {
    const encoder = new TextEncoder();
    const data = encoder.encode(message);
    const hash = await crypto.subtle.digest("SHA-256", data);
    return buf2hex(hash);
}
function buf2hex(buffer) { // buffer is an ArrayBuffer
    return [...new Uint8Array(buffer)]
    .map(x => x.toString(16).padStart(2, '0'))
    .join('');
    }
    