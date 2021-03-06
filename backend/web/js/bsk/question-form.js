$(function() {
    'use strict';

    var global_config = window.bsk_question || {};
    var countor = 1;

    function init() {
        initForm();
    }

    init();

    // 初始化选项或填空答案部分
    function initForm() {
        var type = global_config.type,
            isSelect = type === 1, // 选择题
            isFill = type === 2; // 填空题
        if (isSelect || isFill) {
            var infoInput = $('#' + global_config.infoId),
                info = infoInput.val();
            info = info ? JSON.parse(info) : info;

            if (info) {
                $.each(info, function(i, item) {
                    _addOption(isFill, item);
                });
            } else {
                _addOption(isFill);
            }
        }

        // 监听事件
        $('#questionBody')
            .on('click', 'button[data-role=addOption]', function() {
                _addOption(isFill);
            })
            .on('click', 'a[data-role=delete]', function(e) {
                e.preventDefault();
                var target = $(e.currentTarget),
                    dd = target.parent(),
                    editor;
                editor = CKEDITOR.instances[dd.children(':last').attr('id')];
                if (editor) {
                    editor.destroy();
                }

                if (isSelect) { // 修改前缀
                    dd.siblings('dd').each(function(i, item) {
                        $(item).children('[data-role=prefix]').text(String.fromCharCode(65 + i));
                    });
                }

                dd.remove();
            });
            // 在表单校验前，获取editor中的数据
            $('form').on('beforeValidate', function(e) {
                var form = $(e.currentTarget);
                // title
                var tval = CKEDITOR.instances.title.getData();
                $('#' + global_config.titleId).val(tval);
                // options
                var opts = [];
                var hasCorrect = false;
                $('#questionBody dd').each(function(i, dd) {
                    dd = $(dd);
                    var obj = { text: '' },
                        id = dd.children(':last').attr('id'),
                        editor = CKEDITOR.instances[id];
                    if (editor) {
                        obj.text = editor.getData();
                    }
                    if (isSelect && dd.children('input').is(':checked')) {
                        obj.correct = true;
                        hasCorrect = true;
                    }
                    opts.push(obj);
                });
                $('#' + global_config.infoId).val(opts.length ? JSON.stringify(opts) : '');

                if (!tval) {
                    alert('标题不能为空');
                    return false;
                } else if (isSelect && !opts.length) {
                    alert('选项不能为空');
                    return false;
                } else if (isFill && !opts.length) {
                    alert('填空答案不能为空');
                    return false;
                } else if (isSelect && !hasCorrect) {
                    alert('选项必须设置一个为正确答案');
                    return false;
                }
            });
    }

    function _addOption(isFill, contentObj) {
        contentObj = contentObj || {};
        var body = $('#questionBody'),
            container = body.find('dl[data-role=options]'),
            len = container.children('dd').length,
            id = 'option-' + (countor++),
            item;
        item =  '<dd>' +
                '    <a data-role="delete" href="#" title="删除"><i class="fa fa-times"></i></a>' +
                (isFill ? '' : '    <input type="checkbox" '+(contentObj.correct ? 'checked' : '')+' title="是否正确"/>') +
                (isFill ? '' : '    <span data-role="prefix">'+String.fromCharCode(65 + len)+'</span>. ')+
                '    <div class="dib vat" contenteditable="true" id="'+id+'">'+(contentObj.text ? contentObj.text : '点击这里编辑'+(isFill ? '填空答案' : '选项'))+'</div>' +
                '</dd>'

        container.append(item);
        CKEDITOR.inline(id);
    }

});
