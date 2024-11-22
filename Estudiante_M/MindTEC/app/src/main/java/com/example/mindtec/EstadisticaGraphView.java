package com.example.mindtec;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.util.AttributeSet;
import android.view.View;

public class EstadisticaGraphView extends View {

    private Paint paint;
    private Paint axisPaint;
    private Paint textPaint;
    private int[] datosEstres;

    public EstadisticaGraphView(Context context) {
        super(context);
        init();
    }

    public EstadisticaGraphView(Context context, AttributeSet attrs) {
        super(context, attrs);
        init();
    }

    private void init() {
        paint = new Paint();
        paint.setColor(Color.parseColor("#4CAF50"));
        paint.setStrokeWidth(10);
        paint.setStyle(Paint.Style.FILL);

        axisPaint = new Paint();
        axisPaint.setColor(Color.parseColor("#B0BEC5"));
        axisPaint.setStrokeWidth(3);

        textPaint = new Paint();
        textPaint.setColor(Color.parseColor("#263238"));
        textPaint.setTextSize(30);
        textPaint.setTextAlign(Paint.Align.CENTER);

        datosEstres = new int[]{50, 60, 40, 70, 65, 80, 55};
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);

        int width = getWidth();
        int height = getHeight();

        canvas.drawLine(50, height - 50, width - 50, height - 50, axisPaint);
        canvas.drawLine(50, 50, 50, height - 50, axisPaint);

        for (int i = 0; i <= 10; i++) {
            float y = height - 50 - i * (height - 100) / 10f;
            canvas.drawText(String.valueOf(i * 10), 20, y, textPaint);
        }

        String[] dias = {"L", "M", "X", "J", "V", "S", "D"};
        for (int i = 0; i < dias.length; i++) {
            float x = (i + 1) * (width - 100) / 7f + 50;
            canvas.drawText(dias[i], x, height - 20, textPaint);
        }

        float barWidth = (width - 100) / 7f - 10;

        for (int i = 0; i < datosEstres.length; i++) {
            float x1 = (i + 1) * (width - 100) / 7f + 50 - barWidth / 2;
            float y1 = height - 50 - (height - 100) * datosEstres[i] / 100f;
            float x2 = x1 + barWidth;
            float y2 = height - 50;

            canvas.drawRect(x1, y1, x2, y2, paint);

            float textY = y1 - 10;
            canvas.drawText(String.valueOf(datosEstres[i]), (x1 + x2) / 2, textY, textPaint);
        }
    }
}
