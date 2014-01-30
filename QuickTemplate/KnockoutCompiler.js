/**
 * Compile Knockout templates to quicktemplate JSON
 */
var DOMCompiler = require('./DOMCompiler.js'),
	KnockoutExpression = require('./KnockoutExpression.js'),
	domino = require('domino');

function handleNode(node, cb, options) {
	var dataBind = node.getAttribute('data-bind');
	if (!dataBind) {
		// let processing continue
		return false;
	}
	// XXX: keep this for client-side re-execution?
	node.removeAttribute('data-bind');
	var bindObj = KnockoutExpression.parseObjectLiteral(dataBind),
		tpl,
		ret = {};
	// attr
	if (bindObj.attr) {
		// remove same attributes from element
		Object.keys(bindObj.attr).forEach(function(name) {
			// XXX: don't do destructive updates on the DOM
			node.removeAttribute(name);
		});
		ret.attr = ['attr', bindObj.attr];
	}

	if (bindObj.text) {
		// replace content with text directive
		ret.content = ['text', bindObj.text];
		return ret;
	}

	if (bindObj.foreach) {
		var newOptions = {
			innerXML: true,
			handlers: options.handlers
		};
		tpl = new DOMCompiler().compile(node, newOptions);
		var foreachOptions = {
			data: bindObj.foreach,
			tpl: tpl
		};
		ret.content = ['foreach', foreachOptions];
		return ret;
	}

	if (bindObj['if'] || bindObj.ifnot) {

		var name = bindObj['if'] ? 'if' : 'ifnot';
			newOptions = {
			innerXML: true,
			handlers: options.handlers
		};
		tpl = new DOMCompiler().compile(node, newOptions);
		return {
			content: [name, {
				tpl: tpl,
				data: bindObj[name]
			}]
		};
	}
}

function compile (node) {
	if (node.constructor === String) {
		node = domino.createDocument(node).body.firstChild;
	}
	var options = {
			handlers: {
				'element': handleNode
			}
		};

	return new DOMCompiler().compile(node, options);
}

module.exports = {
	compile: compile
}
