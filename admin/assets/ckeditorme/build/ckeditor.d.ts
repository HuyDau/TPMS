/**
 * @license Copyright (c) 2014-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
import { InlineEditor } from '@ckeditor/ckeditor5-editor-inline';
import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import type { EditorConfig } from '@ckeditor/ckeditor5-core';
import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';
declare class Editor extends InlineEditor {
    static builtinPlugins: (typeof Autoformat | typeof Essentials | typeof Paragraph)[];
    static defaultConfig: EditorConfig;
}
export default Editor;
