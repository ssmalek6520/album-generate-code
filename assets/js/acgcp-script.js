jQuery(document).ready(function ($) {

    $(document).on("change", "#acgcp_selectForCodeGenerate", function () {

        let selectValue = $(this).val();
        if (selectValue != '') {
            $("#acgcp_btnGenerateCode").attr("disabled", false);
            $("#acgcp_btnGenerateCode").removeClass("acgcp_disabledClass").addClass("acgcp_enableClass");
        } else {
            $("#acgcp_btnGenerateCode").attr("disabled", true);
            $("#acgcp_btnGenerateCode").removeClass("acgcp_enableClass").addClass("acgcp_disabledClass");
        }

    });

    $(document).on("click", "#acgcp_copyCode", function () {

        let redeemCode = document.getElementById("acgcp_redeemCode");
        redeemCode.select();
        redeemCode.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(redeemCode.value);

    });
});