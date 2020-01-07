<?php


namespace TrainingKeval\InvoicePDFFont\Model\Order\Pdf {
    /**
     * Use built-in fonts in PDFs so that invoices are smaller.
     *
     */
    class Invoice extends \Magento\Sales\Model\Order\Pdf\Invoice
    {
        /**
         * Set font as regular
         *
         * @param \Zend_Pdf_Page $object
         * @param int $size
         * @return \Zend_Pdf_Resource_Font
         * @throws \Zend_Pdf_Exception
         */
        protected function _setFontRegular($object, $size = 7)
        {
            $font = \Zend_Pdf_Font::fontWithPath(
                $this->_rootDirectory->getAbsolutePath('lib/internal/LinLibertineFont/LinLibertine_Re-4.4.1.ttf')
            );
            $object->setFont($font, $size);
            return $font;
        }

        /**
         * Set font as bold
         *
         * @param \Zend_Pdf_Page $object
         * @param int $size
         * @return \Zend_Pdf_Resource_Font
         * @throws \Zend_Pdf_Exception
         */
        protected function _setFontBold($object, $size = 7)
        {
            $font = \Zend_Pdf_Font::fontWithPath(
                $this->_rootDirectory->getAbsolutePath('lib/internal/LinLibertineFont/LinLibertine_Bd-2.8.1.ttf')
            );
            $object->setFont($font, $size);
            return $font;
        }

        /**
         * Set font as italic
         *
         * @param \Zend_Pdf_Page $object
         * @param int $size
         * @return \Zend_Pdf_Resource_Font
         * @throws \Zend_Pdf_Exception
         */
        protected function _setFontItalic($object, $size = 7)
        {
            $font = \Zend_Pdf_Font::fontWithPath(
                $this->_rootDirectory->getAbsolutePath('lib/internal/LinLibertineFont/LinLibertine_It-2.8.2.ttf')
            );
            $object->setFont($font, $size);
            return $font;
        }
    }
}